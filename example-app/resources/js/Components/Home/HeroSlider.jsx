import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Pagination, EffectFade } from 'swiper/modules';
import { Link } from '@inertiajs/react';
import { ClockIcon } from '@heroicons/react/24/outline';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

const HeroSlider = ({ featuredComics = [] }) => {
    // Dummy data for visualization if no props passed
    const comics = featuredComics.length > 0 ? featuredComics : [
        { 
            id: 1, 
            title: 'One Piece', 
            slug: 'one-piece',
            cover_image: 'https://placehold.co/1200x600/1a1a1a/ffffff?text=One+Piece', 
            latest_chapter: 'Chapter 1100',
            updated_at: '2 giờ trước',
            description: 'Đi tìm kho báu One Piece và trở thành Vua Hải Tặc.'
        },
        { 
            id: 2, 
            title: 'Jujutsu Kaisen', 
            slug: 'jujutsu-kaisen',
            cover_image: 'https://placehold.co/1200x600/1a1a1a/ffffff?text=Jujutsu+Kaisen', 
            latest_chapter: 'Chapter 245',
            updated_at: '5 giờ trước',
            description: 'Cuộc chiến chống lại các nguyền hồn đặc cấp.'
        },
        { 
            id: 3, 
            title: 'Solo Leveling', 
            slug: 'solo-leveling',
            cover_image: 'https://placehold.co/1200x600/1a1a1a/ffffff?text=Solo+Leveling', 
            latest_chapter: 'Chapter 179',
            updated_at: '1 ngày trước',
            description: 'Thợ săn yếu nhất thế giới trở thành người mạnh nhất.'
        },
    ];

    return (
        <div className="w-full relative group">
            <Swiper
                modules={[Autoplay, Pagination, EffectFade]}
                effect={'fade'}
                spaceBetween={0}
                slidesPerView={1}
                autoplay={{
                    delay: 5000,
                    disableOnInteraction: false,
                }}
                pagination={{
                    clickable: true,
                    dynamicBullets: true,
                }}
                loop={true}
                className="w-full h-[250px] md:h-[400px] lg:h-[500px]"
            >
                {comics.map((comic) => (
                    <SwiperSlide key={comic.id}>
                        <div className="relative w-full h-full">
                            {/* Background Image */}
                            <img 
                                src={comic.cover_image} 
                                alt={comic.title} 
                                className="w-full h-full object-cover"
                            />
                            
                            {/* Overlay Gradient */}
                            <div className="absolute inset-0 bg-gradient-to-t from-[#0f0f0f] via-black/50 to-transparent opacity-90"></div>
                            
                            {/* Content */}
                            <div className="absolute bottom-0 left-0 w-full p-6 md:p-10 z-10">
                                <div className="max-w-7xl mx-auto">
                                    <div className="max-w-2xl animate-fade-in-up">
                                        <h2 className="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-2 md:mb-4 drop-shadow-lg truncate">
                                            {comic.title}
                                        </h2>
                                        
                                        <p className="hidden md:block text-gray-300 text-sm md:text-base mb-4 line-clamp-2">
                                            {comic.description}
                                        </p>
                                        
                                        <div className="flex items-center space-x-4">
                                            <span className="inline-flex items-center text-red-500 font-semibold text-sm md:text-base">
                                                {comic.latest_chapter}
                                            </span>
                                            <span className="flex items-center text-gray-400 text-xs md:text-sm">
                                                <ClockIcon className="w-4 h-4 mr-1" />
                                                {comic.updated_at}
                                            </span>
                                        </div>
                                        
                                        <div className="mt-4 md:mt-6">
                                            <Link 
                                                href={`/comics/${comic.slug}`}
                                                className="inline-flex items-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-full transition-all transform hover:scale-105 shadow-lg shadow-red-600/30"
                                            >
                                                Đọc Ngay
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>
            
            {/* Custom Navigation Button Styles could go here if avoiding default Swiper nav */}
            <style jsx global>{`
                .swiper-pagination-bullet {
                    background: #fff;
                    opacity: 0.5;
                }
                .swiper-pagination-bullet-active {
                    background: #e62e2e;
                    opacity: 1;
                }
            `}</style>
        </div>
    );
};

export default HeroSlider;
