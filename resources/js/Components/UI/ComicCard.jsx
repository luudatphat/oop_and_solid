import React from 'react';
import { Link } from '@inertiajs/react';
import { ClockIcon } from '@heroicons/react/24/outline';

const ComicCard = ({ comic }) => {
    // Helper to calculate time ago (simple version)
    // In real app, use date-fns or similar
    const timeAgo = (dateString) => {
        // Placeholder logic
        return dateString || 'Vừa xong';
    };

    return (
        <div className="flex flex-col h-full bg-[#1a1a1a] rounded-lg overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-red-900/20 group">
            {/* Image Container */}
            <Link href={`/comics/${comic.slug}`} className="relative aspect-[2/3] overflow-hidden">
                <img 
                    src={comic.cover_image || 'https://placehold.co/200x300/1a1a1a/ffffff?text=No+Image'} 
                    alt={comic.title} 
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    loading="lazy"
                    onError={(e) => { e.target.onerror = null; e.target.src = 'https://placehold.co/200x300/1a1a1a/ffffff?text=Error'; }}
                />
                
                {/* Hot/New Badge (Optional) */}
                {comic.is_hot && (
                    <div className="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                        HOT
                    </div>
                )}
                
                {/* Overlay on hover */}
                <div className="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </Link>

            {/* Content */}
            <div className="p-3 flex flex-col flex-grow">
                {/* Title */}
                <Link 
                    href={`/comics/${comic.slug}`}
                    className="text-white font-semibold text-sm md:text-base line-clamp-2 hover:text-red-500 transition-colors mb-2"
                    title={comic.title}
                >
                    {comic.title}
                </Link>

                {/* Chapters List */}
                <div className="mt-auto space-y-1.5">
                    {/* Chapter 1 */}
                    <div className="flex justify-between items-center text-xs text-gray-400">
                        <Link 
                            href={`/comics/${comic.slug}/chapter-1`} // Should be dynamic
                            className="bg-[#2a2a2a] hover:bg-[#3a3a3a] px-2 py-1 rounded text-gray-300 hover:text-white transition-colors truncate max-w-[60%]"
                        >
                            {comic.latest_chapter || 'Chapter ?'}
                        </Link>
                        <span className="flex items-center text-[10px] md:text-xs text-gray-500 whitespace-nowrap">
                            <ClockIcon className="w-3 h-3 mr-0.5" />
                            {timeAgo(comic.updated_at)}
                        </span>
                    </div>

                    {/* Chapter 2 (Optional - if data exists) */}
                    {/* For now just showing 1 or based on prop */}
                </div>
            </div>
        </div>
    );
};

export default ComicCard;
