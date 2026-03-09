import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import { Bars3Icon, XMarkIcon, MagnifyingGlassIcon, UserCircleIcon } from '@heroicons/react/24/outline';

const Header = ({ user }) => {
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    const navLinks = [
        { name: 'Trang Chủ', href: '/' },
        { name: 'Thể Loại', href: '/genres' },
        { name: 'Xếp Hạng', href: '/ranking' },
        { name: 'Lịch Sử', href: '/history' },
    ];

    return (
        <header className="fixed top-0 w-full z-50 bg-[#0f0f0f]/95 backdrop-blur-sm border-b border-gray-800">
            <nav className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex justify-between h-16 items-center">
                    {/* Left: Logo & Desktop Nav */}
                    <div className="flex items-center">
                        <Link href="/" className="flex-shrink-0 flex items-center">
                            <span className="text-xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                                Góc Truyện
                            </span>
                        </Link>
                        
                        {/* Desktop Navigation */}
                        <div className="hidden md:ml-10 md:flex md:space-x-8">
                            {navLinks.map((link) => (
                                <Link
                                    key={link.name}
                                    href={link.href}
                                    className="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors"
                                >
                                    {link.name}
                                </Link>
                            ))}
                        </div>
                    </div>

                    {/* Right: Search & Auth */}
                    <div className="flex items-center space-x-4">
                        <button className="p-2 text-gray-400 hover:text-white transition-colors">
                            <MagnifyingGlassIcon className="h-6 w-6" />
                        </button>

                        <div className="hidden md:flex items-center space-x-4">
                            {user ? (
                                <div className="flex items-center space-x-2 text-gray-300">
                                    <UserCircleIcon className="h-8 w-8" />
                                    <span className="text-sm font-medium">{user.name}</span>
                                </div>
                            ) : (
                                <>
                                    <Link
                                        href="/login"
                                        className="text-gray-300 hover:text-white text-sm font-medium"
                                    >
                                        Đăng nhập
                                    </Link>
                                    <Link
                                        href="/register"
                                        className="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors"
                                    >
                                        Đăng ký
                                    </Link>
                                </>
                            )}
                        </div>

                        {/* Mobile menu button */}
                        <div className="flex items-center md:hidden">
                            <button
                                onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
                                className="p-2 text-gray-400 hover:text-white"
                            >
                                {isMobileMenuOpen ? (
                                    <XMarkIcon className="h-6 w-6" />
                                ) : (
                                    <Bars3Icon className="h-6 w-6" />
                                )}
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            {/* Mobile Menu */}
            {isMobileMenuOpen && (
                <div className="md:hidden bg-[#1a1a1a] border-b border-gray-800">
                    <div className="space-y-1 px-4 py-3">
                        {navLinks.map((link) => (
                            <Link
                                key={link.name}
                                href={link.href}
                                className="block text-gray-300 hover:text-white hover:bg-gray-800 px-3 py-2 rounded-md text-base font-medium"
                            >
                                {link.name}
                            </Link>
                        ))}
                        <div className="border-t border-gray-700 my-2 pt-2">
                            {user ? (
                                <div className="flex items-center space-x-3 px-3 py-2 text-gray-300">
                                    <UserCircleIcon className="h-6 w-6" />
                                    <span>{user.name}</span>
                                </div>
                            ) : (
                                <div className="space-y-2">
                                    <Link
                                        href="/login"
                                        className="block text-gray-300 hover:text-white px-3 py-2"
                                    >
                                        Đăng nhập
                                    </Link>
                                    <Link
                                        href="/register"
                                        className="block bg-red-600 text-white text-center px-3 py-2 rounded-md"
                                    >
                                        Đăng ký
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            )}
        </header>
    );
};

export default Header;
