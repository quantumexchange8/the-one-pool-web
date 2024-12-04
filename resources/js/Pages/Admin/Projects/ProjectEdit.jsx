import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import CreateProject from './Partials/CreateProject';
import DeleteProject from './Partials/DeleteProject';
import UpdateProject from './Partials/UpdateProject';

export default function ProjectEdit() {

    const [projects, setProjects] = useState([]);

    const fetchProjects = async () => {
        try {
            const response = await axios.get('/projectlist');
            setProjects(response.data);
        } catch (error) {
            console.error('Error fetching projects:', error);
        }
    };

    useEffect(() => {
        fetchProjects();
    }, []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Projects Edit
                </h2>
            }
        >
            <Head title="Projects" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <div className="flex flex-col gap-3">
                            <header className='flex justify-between'>
                                <div className="text-lg font-medium text-gray-900">
                                    Project List
                                </div>
                                <CreateProject 
                                    onProjectCreated={() => fetchProjects()}
                                />
                            </header>
                            <ul className="flex flex-col gap-2 max-h-screen overflow-auto border rounded-xl p-3">
                                {projects.map(project => (
                                    <li key={project.id}>
                                        <div className="border rounded-xl flex justify-between p-3 items-center gap-3 md:gap-0">
                                            {project.category}: {project.client}
                                            <div className='flex flex-col md:flex-row items-center gap-2 md:gap-4'>
                                                <UpdateProject 
                                                    project={project}
                                                    onProjectUpdated={() => fetchProjects()}
                                                />
                                                <DeleteProject 
                                                    projectId={project.id}
                                                    onProjectDeleted={(deletedProjectId) => {
                                                        setProjects(projects.filter(project => project.id !== deletedProjectId));
                                                    }}
                                                />
                                            </div>
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
