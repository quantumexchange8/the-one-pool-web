import React, { useState, useEffect } from "react";
import { Dialog } from 'primereact/dialog';
import AddButton from "@/Components/AddButton";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { useForm } from '@inertiajs/react';

export default function CreateProject({className, onProjectCreated}) {

    const [visible, setVisible] = useState(false);

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

    const { data, setData, post, processing, errors, reset} = useForm({
        title: '',   
        description: '',   
        category: '',   
        location: '',
        client: '',
        date: '',
        images: null,
    });

    const handleImageChange = (e) => {
        const files = Array.from(e.target.files);
        setData('images', files); 
    };

    const submit = (e) => {
        e.preventDefault();
        post(route('admin.storeProject'), {
            onSuccess: () => {
                reset();
                document.getElementById('images').value = '';
    
                alert('Create Project Successfully.');

                setVisible(false);

                if(onProjectCreated) {
                    onProjectCreated();
                }
            },
            onError: () => {
                alert('Fail To Create Project.');
            }
        });
    };
    
    return (
        <section className={className}>
            <div className="flex flex-col gap-3">
                <AddButton onClick={() => setVisible(true)}>
                    + New Project
                </AddButton>
                
                <Dialog header="Create New Project" visible={visible} style={{ width:'1536px'}} onHide={() => {if (!visible) return; setVisible(false);}}>
                    <form onSubmit={submit} className="flex flex-col gap-4">
                        {/* Title */}
                        <div className="flex flex-col gap-1">
                            <InputLabel htmlFor="title" value="Title" />
                            <TextInput
                                id="title"
                                type="text"
                                title="title"
                                value={data.title}
                                className="block w-full"
                                autoComplete="off"
                                isFocused={true}
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
                                name="description"
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
                                className="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
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
                                name="location"
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
                                name="client"
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
                                name="date"
                                value={data.date}
                                className="block w-full"
                                autoComplete="off"
                                onChange={(e) => setData('date', e.target.value)}
                                required
                            />
                            <InputError message={errors.date} className="mt-2" />
                        </div>

                        {/* Images */}
                        <div className=" flex flex-col gap-2">
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
                        <div className=" flex items-center justify-end">
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
