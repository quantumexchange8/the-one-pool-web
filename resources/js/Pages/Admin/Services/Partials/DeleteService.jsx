import React from 'react';
import DangerButton from '@/Components/DangerButton';

export default function DeleteService({ serviceId, onServiceDeleted }) {

    const handleDelete = async () => {
        if (!confirm('Are you sure you want to delete this service?')) {
            return;
        }

        try {
            const response = await axios.post(`/destroyService/${serviceId}`);
            if (response.status === 200) {
                alert('Service deleted successfully.');
                if (onServiceDeleted) {
                    onServiceDeleted(serviceId);
                }
            }
        } catch (error) {
            console.error('Error deleting service:', error);
            alert('Failed to delete service. Please try again.');
        }
    };

    return (
        <DangerButton onClick={handleDelete}>
            Delete
        </DangerButton>
    );
}
