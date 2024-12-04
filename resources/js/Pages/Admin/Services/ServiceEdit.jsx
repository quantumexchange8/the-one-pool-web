import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import CreateService from './Partials/CreateService';
import DeleteService from './Partials/DeleteService';
import UpdateService from './Partials/UpdateService';

export default function ServiceEdit() {

    const [services, setServices] = useState([]);

    const fetchServices = async () => {
        try {
            const response = await axios.get('/servicelist');
            setServices(response.data);
        } catch (error) {
            console.error('Error fetching services:', error);
        }
    };

    useEffect(() => {
        fetchServices();
    }, []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Services Edit
                </h2>
            }
        >
            <Head title="Services" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <div className="flex flex-col gap-3">
                            <header className='flex justify-between'>
                                <div className="text-lg font-medium text-gray-900">
                                    Service List
                                </div>
                                <CreateService 
                                    onServiceCreated={() => fetchServices()}
                                />
                            </header>
                            <ul className="flex flex-col gap-2 max-h-screen overflow-auto border rounded-xl p-3">
                                {services.map(service => (
                                    <div key={service.id}>
                                        <div className="border rounded-xl flex gap-3 md:gap-0 justify-between p-3 items-center">
                                            {service.name}
                                            <div className='flex flex-col items-center md:flex-row gap-2 md:gap-4'>
                                                <UpdateService 
                                                    service={service} 
                                                    onServiceUpdated={() => fetchServices()}
                                                />
                                                <DeleteService 
                                                    serviceId={service.id}
                                                    onServiceDeleted={(deletedServiceId) => {
                                                        setServices(services.filter(service => service.id !== deletedServiceId));
                                                    }}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
