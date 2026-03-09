import React from 'react';
import { Link } from '@inertiajs/react';

const Footer = () => {
    return (
        <footer className="bg-[#0a0a0a] border-t border-gray-800 text-gray-400 py-8 mt-12">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex flex-col md:flex-row justify-between items-center">
                    <div className="mb-4 md:mb-0">
                        <Link href="/" className="text-xl font-bold text-white">
                            Góc Truyện
                        </Link>
                        <p className="mt-2 text-sm text-gray-500">
                            Nền tảng đọc truyện tranh miễn phí hàng đầu.
                        </p>
                    </div>
                    
                    <div className="flex space-x-6">
                        <a href="#" className="hover:text-white transition-colors">
                            Facebook
                        </a>
                        <a href="#" className="hover:text-white transition-colors">
                            Discord
                        </a>
                        <a href="#" className="hover:text-white transition-colors">
                            Liên hệ
                        </a>
                    </div>
                </div>
                
                <div className="mt-8 pt-8 border-t border-gray-800 text-center text-sm text-gray-600">
                    <p>&copy; 2026 Góc Truyện. All rights reserved.</p>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
