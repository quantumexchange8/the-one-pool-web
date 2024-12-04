import React, { useState, useEffect } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import axios from 'axios';

export default function Dashboard() {
    const [stats, setStats] = useState({ admins: 0, services: 0, projects: 0 });

    useEffect(() => {
        const fetchStats = async () => {
            try {
                const response = await axios.get(route('dashboard.stats'));
                setStats(response.data);
            } catch (error) {
                console.error('Failed to fetch dashboard stats:', error);
            }
        };

        fetchStats();
    }, []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 flex flex-col gap-5">
                            <div className="text-gray-900 text-xl text-center">
                                Welcome to the Administration Side. Select the action to be performed.
                            </div>
                            <div className="flex flex-col gap-4 border rounded-xl p-4">
                                <div className='flex flex-col gap-2 border rounded-xl p-4 text-lg'>
                                    Number of Admin: {stats.admins}
                                    <div className='flex justify-end'>
                                        <a
                                            href={route('admin.profile')}
                                            className="w-auto border text-center text-lg rounded-xl p-3"
                                        >
                                            Manage Admin
                                        </a>
                                    </div>
                                </div>
                                <div className='flex flex-col gap-2 border rounded-xl p-4 text-lg'>
                                    Number of Services: {stats.services}
                                    <div className='flex justify-end'>
                                        <a
                                            href={route('admin.service')}
                                            className="w-auto border text-center text-lg rounded-xl p-3"
                                        >
                                            Manage Services
                                        </a>
                                    </div>
                                </div>
                                <div className='flex flex-col gap-2 border rounded-xl p-4 text-lg'>
                                    Number of Projects: {stats.projects}
                                    <div className='flex justify-end'>
                                        <a
                                            href={route('admin.project')}
                                            className="w-auto border text-center text-lg rounded-xl p-3"
                                        >
                                            Manage Projects
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
