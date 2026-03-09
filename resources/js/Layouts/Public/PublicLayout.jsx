import React from 'react';
import Header from '@/Components/Common/Header';
import Footer from '@/Components/Common/Footer';
import { usePage } from '@inertiajs/react';

const PublicLayout = ({ children }) => {
    const { auth } = usePage().props;
    const user = auth?.user;

    return (
        <div className="min-h-screen bg-[#0f0f0f] text-white font-sans flex flex-col selection:bg-red-500 selection:text-white">
            {/* Header */}
            <Header user={user} />
            
            {/* Main Content */}
            <main className="flex-grow pt-16">
                {children}
            </main>
            
            {/* Footer */}
            <Footer />
        </div>
    );
};

export default PublicLayout;
