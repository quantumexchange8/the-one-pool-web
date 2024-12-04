import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CreateAdmin from './Partials/CreateAdmin';
import { useState, useEffect } from 'react';

export default function Edit() {

    const [admins, setAdmins] = useState([]);

    useEffect(() => {
        fetchAdmins();
    }, []);

    const fetchAdmins = async () => {
        try {
            const response = await axios.get('/adminlist');
            setAdmins(response.data);
        } catch (error) {
            console.error('Error fetching admins:', error);
        }
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Admin Edit
                </h2>
            }
        >
            <Head title="Admin" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <div className="flex flex-col gap-3">
                            <header className='flex justify-between'>
                                <div className="text-lg font-medium text-gray-900">
                                    Admin List
                                </div>
                                <CreateAdmin />
                            </header>
                            <ul className="flex flex-col gap-2 max-h-screen overflow-auto border rounded-xl p-3">
                                {admins.map(admin => (
                                    <li key={admin.id}>
                                        <div className="border rounded-xl flex justify-between p-3 items-center">
                                            {admin.name}
                                        </div>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
