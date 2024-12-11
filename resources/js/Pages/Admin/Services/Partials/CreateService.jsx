import React, { useState } from "react";
import { Dialog } from 'primereact/dialog';
import AddButton from "@/Components/AddButton";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { useForm } from '@inertiajs/react';
import DangerButton from "@/Components/DangerButton";
import UpdateButton from "@/Components/UpdateButton";

export default function CreateService({className, onServiceCreated}) {
    
    const [visible, setVisible] = useState(false);

    const { data, setData, post, processing, errors, reset} = useForm({
        name: '',   
        subtitle: '',   
        description: '',   
        details: [],
        images: null,
    });

    const updateDetailItem = (sectionIndex, itemIndex, value) => {
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex
                ? {
                      ...section,
                      items: section.items.map((item, i) =>
                          i === itemIndex ? value : item
                      ),
                  }
                : section
        );
        setData('details', updatedDetails);
    };

    const addDetailItem = (sectionIndex) => {
        const updatedDetails = data.details.map((section, idx) =>
            idx === sectionIndex
                ? { ...section, items: [...section.items, ''] }
                : section
        );
        setData('details', updatedDetails);
    };
    
    const removeDetailItem = (sectionIndex, itemIndex) => {
        const updatedDetails = [...data.details];
        if (updatedDetails[sectionIndex].items.length > 1) {
            updatedDetails[sectionIndex].items = updatedDetails[sectionIndex].items.filter(
                (_, index) => index !== itemIndex
            );
            setData('details', updatedDetails);
        } else {
            alert('Each section must have at least one item.');
        }
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
            { title: '', items: [''] },
        ]);
    };

    const removeSection = (sectionIndex) => {
        const updatedDetails = data.details.filter((_, index) => index !== sectionIndex);
        setData({ ...data, details: updatedDetails });
    };

    const handleImageChange = (e) => {
        const files = Array.from(e.target.files);
        setData('images', files); 
    };

    const submit = (e) => {
        e.preventDefault();
        post(route('admin.store_service'), {
            onSuccess: () => {
                alert('Service Created Successfully.');
                reset();
                setVisible(false);
                if(onServiceCreated) {
                    onServiceCreated();
                }
            },
            onError: () => {
                alert('Fail To Create Service.');
            }
        });
    };    

    return (
        <section className={className}>
            <div className="card flex justify-content-center">
                <AddButton onClick={() => setVisible(true)}>
                    + New Service
                </AddButton>
                
                <Dialog header="Create New Service" visible={visible} style={{ width:'1536px'}} onHide={() => {if (!visible) return; setVisible(false);}}>
                    <form onSubmit={submit}>
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
                        <div className="flex flex-col gap-4 mt-4">
                            <InputLabel value="Details" />
                            {data.details.map((section, sectionIndex) => (
                                <div key={sectionIndex} className="flex flex-col gap-5 border p-4 rounded">
                                    <div className="flex gap-2 justify-between items-center">
                                        {/* Title for the section */}
                                        <TextInput
                                            value={section.title}
                                            className="block w-full font-semibold"
                                            placeholder="Section Title"
                                            onChange={(e) => updateSectionTitle(sectionIndex, e.target.value)}
                                            required
                                        />
                                        <DangerButton onClick={() => removeSection(sectionIndex)}>
                                            Remove Section
                                        </DangerButton>
                                    </div>
                                    {/* Items for the section */}
                                    <div className="flex flex-col gap-4">
                                        {section.items.map((item, itemIndex) => (
                                            <div key={itemIndex} className="flex gap-2 items-center">
                                                <TextInput
                                                    value={item}
                                                    className="block w-full"
                                                    onChange={(e) => updateDetailItem(sectionIndex, itemIndex, e.target.value)}
                                                    placeholder="Detail Item"
                                                    required
                                                />
                                                {section.items.length > 1 && (
                                                    <DangerButton onClick={() => removeDetailItem(sectionIndex, itemIndex)}>
                                                        Remove
                                                    </DangerButton>
                                                )}
                                            </div>
                                        ))}
                                        <UpdateButton type="button" className="w-[130px] justify-center" onClick={() => addDetailItem(sectionIndex)}> 
                                            + Add Detail
                                        </UpdateButton>
                                    </div>
                                </div>
                            ))}
                            <AddButton type="button" className="w-[140px] justify-center" onClick={addSection}>
                                + Add Section
                            </AddButton>
                            <InputError message={errors.details} className="mt-2" />
                        </div>

                        {/* Images*/}
                        <div className="mt-4 flex flex-col gap-2">
                            <InputLabel htmlFor="images" value="Images" />
                            <input
                                type="file"
                                id="images"
                                name="images"
                                className="border border-gray-300 rounded-md shadow-sm py-2 px-3 w-auto"
                                multiple
                                onChange={handleImageChange}
                                required
                            />
                            {errors.images && <div>{errors.images}</div>}
                        </div>
                        
                        {/* Submit*/}
                        <div className="mt-4 flex items-center justify-end">
                            <PrimaryButton className="ms-4" disabled={processing}>
                                Create
                            </PrimaryButton>
                        </div>
                    </form>
                </Dialog>
            </div>
        </section>
    );
}
