import React from 'react';
import { Head } from '@inertiajs/react';
import PublicLayout from '@/Layouts/Public/PublicLayout';
import HeroSlider from '@/Components/Home/HeroSlider';
import SectionHeader from '@/Components/Home/SectionHeader';
import ComicCard from '@/Components/UI/ComicCard';
import { SparklesIcon, FireIcon } from '@heroicons/react/24/solid';

const Home = ({ comics = [] }) => {
    return (
        <>
            <Head title="Trang chủ - Góc Truyện" />
            
            {/* Hero Section */}
            <div className="mb-8 md:mb-12">
                <HeroSlider />
            </div>

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 pb-12">
                {/* Top Views Section (Example) */}
                <section>
                    <SectionHeader 
                        title="Nổi Bật Hôm Nay" 
                        icon={FireIcon} 
                        link="/ranking"
                    />
                    {/* Placeholder for vertical list style top views, or just use grid for now */}
                     <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 gap-y-6 md:gap-y-8">
                        {comics.length > 0 ? (
                            comics.slice(0, 6).map((comic) => (
                                <ComicCard key={comic.id} comic={comic} />
                            ))
                        ) : (
                            <div className="col-span-full text-center py-10 text-gray-500">
                                Đang cập nhật...
                            </div>
                        )}
                    </div>
                </section>

                {/* Latest Updates Section */}
                <section>
                    <SectionHeader 
                        title="Truyện Mới Cập Nhật" 
                        icon={SparklesIcon} 
                        link="/comics"
                    />
                    
                    <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 gap-y-6 md:gap-y-8">
                        {comics.length > 0 ? (
                            comics.map((comic) => (
                                <ComicCard key={comic.id} comic={comic} />
                            ))
                        ) : (
                            <div className="col-span-full text-center py-10 text-gray-500">
                                Chưa có truyện nào
                            </div>
                        )}
                    </div>
                </section>
            </div>
        </>
    );
};

Home.layout = page => <PublicLayout>{page}</PublicLayout>;

export default Home;
