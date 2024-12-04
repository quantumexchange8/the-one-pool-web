import React from 'react';
import DangerButton from './DangerButton';
import InputLabel from '@/Components/InputLabel';
import axios from 'axios';

const ServiceImages = ({ images, serviceId, onImageDeleted, onImageAdded }) => {
    if (!images || images.length === 0) return null;

    const handleRemove = async (imageId) => {
        if (images.length === 1) {
            alert('A service must have at least one image.');
            return;
        }
        
        if (!confirm('Are you sure you want to remove this image?')) {
            return;
        }

        try {
            const response = await axios.post(`/destroyServiceImage/${imageId}`);
            if (response.status === 200) {
                alert('Image removed successfully.');
                if (onImageDeleted) {
                    onImageDeleted(imageId);
                }
            }
        } catch (error) {
            console.error('Error removing image:', error);
            alert('Failed to remove the image. Please try again.');
        }
    };

    const handleImageChange = async (e) => {
        const files = Array.from(e.target.files);
    
        if (!files.length) return;
    
        const formData = new FormData();
        files.forEach((file) => {
            formData.append('images[]', file);
        });
    
        formData.append('service_id', serviceId);
    
        try {
            const response = await axios.post('/uploadServiceImage', formData); 
            if (response.status == 200) {
                alert('Images uploaded successfully.');

                e.target.value = '';
                
                if (onImageAdded) {
                    onImageAdded(response.data.images);
                }
            }
            
        } catch (error) {
            console.error('Image upload failed:', error);
            alert('Failed to upload the images. Please try again.');
        }
    };
    

    return (
        <div className="mt-4 flex flex-col gap-4">
            {/* Current Images */}
            <div>
                <div className="text-sm font-medium text-gray-700">Current Images</div>
                <div className="h-auto max-h-[275px] overflow-auto flex flex-col gap-4 mt-1 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                    {images.map((image, index) => (
                        <div
                            key={image.id}
                            className="flex justify-between items-center gap-2 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"
                        >
                            <a
                                href={image.image_path}
                                className="underline"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Service Image {index + 1}
                            </a>
                            <DangerButton onClick={() => handleRemove(image.id)}>
                                Remove
                            </DangerButton>
                        </div>
                    ))}
                </div>
            </div>
            {/* Add New Images */}
            <div className='flex flex-col gap-1'>
                <InputLabel htmlFor="images" className="text-sm font-medium">
                    Add New Images
                </InputLabel>
                <div className="flex flex-col justify-between gap-2 w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                    <input
                        type="file"
                        id="images"
                        name="images"
                        multiple
                        onChange={handleImageChange}
                    />
                </div>
            </div>
        </div>
    );
};

export default ServiceImages;
