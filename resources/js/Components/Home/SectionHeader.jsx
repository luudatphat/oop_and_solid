import React from 'react';
import { Link } from '@inertiajs/react';
import { ChevronRightIcon } from '@heroicons/react/24/outline';

const SectionHeader = ({ title, link, icon: Icon }) => {
    return (
        <div className="flex justify-between items-center mb-4 md:mb-6 border-b border-gray-800 pb-2">
            <div className="flex items-center">
                {Icon && <Icon className="w-5 h-5 md:w-6 md:h-6 text-red-600 mr-2" />}
                <h2 className="text-xl md:text-2xl font-bold text-white uppercase tracking-wide">
                    {title}
                </h2>
            </div>
            
            {link && (
                <Link 
                    href={link}
                    className="flex items-center text-sm text-gray-400 hover:text-white transition-colors group"
                >
                    Xem tất cả
                    <ChevronRightIcon className="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" />
                </Link>
            )}
        </div>
    );
};

export default SectionHeader;
