import React, { useState, useEffect } from "react";
import { Dialog } from 'primereact/dialog';
import EditButton from "@/Components/EditButton";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import ProjectImages from "@/Components/ProjectImages";
import { useForm } from '@inertiajs/react';

export default function UpdateProject({ className, project, onProjectUpdated }) {

    const [visible, setVisible] = useState(false);
    const [images, setImages] = useState(project.images);
    const [services, setServices] = useState([]);

    useEffect(() => {
        const fetchServices = async () => {
            try {
                const response = await axios.get(route('serviceList'));
                setServices(response.data);
            } catch (error) {
                console.error('Failed to fetch services:', error);
            }
        };

        fetchServices();
    }, []);

    const { data, setData, put, processing, errors } = useForm({
        id: project.id,
        title: project.title,
        description: project.description,
        category: project.category,
        location: project.location,
        client: project.client,
        date: project.date,
        images: null,
    });

    const handleImageDeleted = (deletedImageId) => {
        setImages(images.filter((image) => image.id !== deletedImageId));
    };

    const handleNewImagesAdded = (newImages) => {
        setImages([...images, ...newImages]);
    };

    const handleUpdate = (e) => {
        e.preventDefault();

        put(route('admin.updateProject', { id: project.id }), {
            onSuccess: () => {
                alert('Project updated successfully.');
                setVisible(false);
                if(onProjectUpdated) {
                    onProjectUpdated();
                }
                setVisible(false);
            },
            onError: (errors) => {
                console.error("Update failed", errors);
            }
        });
    };

    return (
        <section className={className}>
            <div className="card flex justify-content-center">
                <EditButton onClick={() => setVisible(true)}>
                    Edit
                </EditButton>
                
                <Dialog header="Update Project" visible={visible} style={{ width: '80vw' }} onHide={() => { setVisible(false); }}>
                    <form onSubmit={handleUpdate} className="flex flex-col gap-4">
                        {/* Title */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="title" value="Title" />
                            <TextInput
                                id="title"
                                type="text"
                                value={data.title}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('title', e.target.value)}
                                required
                            />
                            <InputError message={errors.title} className="mt-2" />
                        </div>

                        {/* Description */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="description" value="Description" />
                            <TextInput
                                id="description"
                                type="text"
                                value={data.description}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('description', e.target.value)}
                                required
                            />
                            <InputError message={errors.description} className="mt-2" />
                        </div>

                        {/* Service Category */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="category" value="Service Category" />
                            <select
                                id="category"
                                name="category"
                                value={data.category}
                                onChange={(e) => setData('category', e.target.value)}
                                className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required
                            >
                                <option value="" disabled>
                                    Select a category
                                </option>
                                {services.map((service) => (
                                    <option key={service.id} value={service.name}>
                                        {service.name}
                                    </option>
                                ))}
                            </select>
                            <InputError message={errors.category} className="mt-2" />
                        </div>

                        {/* Location */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="location" value="Location" />
                            <TextInput
                                id="location"
                                type="text"
                                value={data.location}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('location', e.target.value)}
                                required
                            />
                            <InputError message={errors.location} className="mt-2" />
                        </div>

                        {/* Client */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="client" value="Client" />
                            <TextInput
                                id="client"
                                type="text"
                                value={data.client}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('client', e.target.value)}
                                required
                            />
                            <InputError message={errors.client} className="mt-2" />
                        </div>

                        {/* Date */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="date" value="Date" />
                            <TextInput
                                id="date"
                                type="date"
                                value={data.date}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('date', e.target.value)}
                                required
                            />
                            <InputError message={errors.date} className="mt-2" />
                        </div>

                        {/* Project Images */}
                        <ProjectImages images={images} projectId={data.id} onImageDeleted={handleImageDeleted} onImageAdded={handleNewImagesAdded}/>

                        {/* Submit Button */}
                        <div className="flex items-center justify-end">
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
