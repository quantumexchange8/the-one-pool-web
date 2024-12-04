import React from 'react';
import DangerButton from '@/Components/DangerButton';

export default function DeleteProject({ projectId, onProjectDeleted }) {

    const handleDelete = async () => {
        if (!confirm('Are you sure you want to delete this project?')) {
            return;
        }

        try {
            const response = await axios.post(`/destroyProject/${projectId}`);
            if (response.status === 200) {
                alert('Project deleted successfully.');
                if (onProjectDeleted) {
                    onProjectDeleted(projectId);
                }
            }
        } catch (error) {
            console.error('Error deleting project:', error);
            alert('Failed to delete project. Please try again.');
        }
    };

    return (
        <DangerButton onClick={handleDelete}>
            Delete
        </DangerButton>
    );
}
