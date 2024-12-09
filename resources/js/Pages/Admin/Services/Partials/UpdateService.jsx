import React, { useState } from "react";
import { Dialog } from 'primereact/dialog';
import EditButton from "@/Components/EditButton";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import ServiceImages from "@/Components/ServiceImages";
import { useForm } from '@inertiajs/react';
import DangerButton from "@/Components/DangerButton";
import AddButton from "@/Components/AddButton";

export default function UpdateService({ className, service, onServiceUpdated }) {
    
    const [visible, setVisible] = useState(false);
    const [images, setImages] = useState(service.images);

    const { data, setData, put, processing, errors} = useForm({
        id: service.id,
        name: service.name,   
        subtitle: service.subtitle,   
        description: service.description,   
        details: service.details,
        images: null,
        item: service.details.section,
    });

    const updateDetailItem = (sectionIndex, itemIndex, value) => {
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex
                ? {
                      ...section,
                      items: section.items.map((item, i) =>
                          i === itemIndex 
                            ? {
                                ...item,
                                item : value
                            } : item
                      ),
                  }
                : section 
        );
        setData('details', updatedDetails);
    };

    const addDetailItem = (sectionIndex) => {
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex
                ? { ...section, items: [...section.items, { item: '', section_id: section.id }] }
                : section
        );
        setData('details', updatedDetails);
    };

    const removeDetailItem = async (sectionIndex, itemIndex) => {
        const itemToRemove = data.details[sectionIndex].items[itemIndex];

        if (!confirm('Are you sure you want to remove this detail?')) {
            return;
        }

        if (itemToRemove.id) {
            try {
                const response = await axios.post(`/destroyServiceDetail/${itemToRemove.id}`);
                if (response.status === 200) {
                    alert('Detail removed successfully.');
                }
            } catch (error) {
                console.error("Error removing detail:", error);
                return;
            }
        }
    
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex
                ? {
                    ...section,
                    items: section.items.filter((_, index) => index !== itemIndex),
                  }
                : section
        );
    
        setData('details', updatedDetails);
    };
    

    const updateSectionTitle = (sectionIndex, value) => {
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex ? { ...section, title: value } : section
        );
        setData('details', updatedDetails);
    };

    const addSection = () => {
        setData('details', [
            ...data.details,
            { title: '', items: [{ item: '', section_id: null }] } 
        ]);
    };

    const removeSection = async (sectionIndex) => {
        const sectionToRemove = data.details[sectionIndex];

        if(!confirm('Are you sure you want to remove this section?')) {
            return;
        }

        if(sectionToRemove.id) {
            try {
                const response = await axios.post(`/destroyServiceSection/${sectionToRemove.id}`);
                if(response.status == 200) {
                    alert('Section removed successfully.')
                }
            } catch (error) {
                console.error("Error removing detail:", error);
                return;
            }
        }

        const updatedDetails = data.details.filter((_, index) => index !== sectionIndex);

        setData({ ...data, details: updatedDetails });
    };

    const handleImageDeleted = (deletedImageId) => {
        setImages(images.filter((image) => image.id !== deletedImageId));
    };

    const handleNewImagesAdded = (newImages) => {
        setImages([...images, ...newImages]);
    };

    const handleUpdate = (e) => {
        e.preventDefault();
        put(route('admin.update_service', { id: service.id }), {
            onSuccess: () => {
                alert('Service updated successfully.');
                if (onServiceUpdated) {
                    onServiceUpdated();
                }
                setVisible(false);
            },
        });
  };   

    return (
        <section className={className}>
            <div className="card flex justify-content-center">
                <EditButton onClick={() => setVisible(true) } >
                    Edit
                </EditButton>
                
                <Dialog header="Update Service" visible={visible} style={{ width:'1536px'}} onHide={() => {if (!visible) return; setVisible(false);}}>
                    <form onSubmit={handleUpdate}>
                        {/* Name*/}
                        <div>
                            <InputLabel htmlFor="name" value="Name" />
                            <TextInput
                                id="name"
                                type="text"
                                name="name"
                                value={data.name}
                                className="mt-1 block w-full"
                                autoComplete="off"
                                isFocused={true}
                                onChange={(e) => setData('name', e.target.value)}
                                required
                            />
                            <InputError message={errors.name} className="mt-2" />
                        </div>

                        {/* Subtitle*/}
                        <div className="mt-4">
                            <InputLabel htmlFor="subtitle" value="Subtitle" />
                            <TextInput
                                id="subtitle"
                                type="text"
                                name="subtitle"
                                value={data.subtitle}
                                className="mt-1 block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('subtitle', e.target.value)}
                                required
                            />
                            <InputError message={errors.subtitle} className="mt-2" />
                        </div>

                        {/* Description*/}
                        <div className="mt-4">
                            <InputLabel htmlFor="description" value="Description" />
                            <TextInput
                                id="description"
                                type="text"
                                name="description"
                                value={data.description}
                                className="mt-1 block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('description', e.target.value)}
                                required
                            />
                            <InputError message={errors.description} className="mt-2" />
                        </div>

                        {/* Details Section */}
                        <div className="mt-4">
                          <InputLabel value="Details" />
                          {data.details.map((section, sectionIndex) => (
                            <div key={sectionIndex} className="mt-4 border p-4 rounded">
                              <div className="flex justify-between items-center gap-2 mb-4">
                                {/* Title for the section */}
                                <TextInput
                                  value={section.title}
                                  className="block w-full font-semibold"
                                  placeholder="Section Title"
                                  onChange={(e) => updateSectionTitle(sectionIndex, e.target.value)} 
                                  required
                                />
                                <DangerButton
                                  type="button"
                                  onClick={() => removeSection(sectionIndex)}
                                >
                                  Remove Section
                                </DangerButton>
                              </div>
                              {/* Items for the section */}
                              {section.items.map((items, itemIndex) => (
                                <div key={itemIndex} className="flex gap-2 mt-2 items-center">
                                  <TextInput
                                    value={items.item}
                                    className="block w-full"
                                    onChange={(e) => updateDetailItem(sectionIndex, itemIndex, e.target.value)}
                                    placeholder="Detail Item"
                                    required
                                  />
                                  {section.items.length > 1 && (
                                    <DangerButton
                                      type="button"
                                      onClick={() => removeDetailItem(sectionIndex, itemIndex)} 
                                    >
                                      Remove
                                    </DangerButton>
                                  )}
                                </div>
                              ))}
                              <EditButton type="button" className="text-blue-600 mt-2" onClick={() => addDetailItem(sectionIndex, section.id)}>
                                + Add Detail
                              </EditButton>
                            </div>
                          ))}
                          <AddButton type="button" className="mt-4 text-green-600" onClick={addSection}>
                            + Add Section
                          </AddButton>
                          <InputError message={errors.details} className="mt-2" />
                        </div>

                        {/* Images */}
                        <ServiceImages images={images} serviceId={data.id} onImageDeleted={handleImageDeleted} onImageAdded={handleNewImagesAdded}/>

                        {/* Submit*/}
                        <div className="mt-4 flex items-center justify-end">
                            <PrimaryButton className="ms-4" disabled={processing}>
                                Done
                            </PrimaryButton>
                        </div>
                    </form>
                </Dialog>
            </div>
        </section>
    );
}
