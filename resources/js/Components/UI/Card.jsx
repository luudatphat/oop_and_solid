import React from 'react';

/**
 * Card Component
 * Component card cơ bản để hiển thị nội dung
 * 
 * @param {Object} props
 * @param {React.ReactNode} props.children - Nội dung card
 * @param {string} props.title - Tiêu đề card
 * @param {string} props.className - Additional CSS classes
 * @param {boolean} props.hoverable - Có hiệu ứng hover không
 */
const Card = ({ 
  children, 
  title, 
  className = '',
  hoverable = false,
  ...props 
}) => {
  const baseStyles = 'bg-white rounded-lg shadow-md overflow-hidden';
  const hoverStyles = hoverable ? 'transition-transform duration-200 hover:shadow-lg hover:-translate-y-1' : '';
  
  const cardClasses = `${baseStyles} ${hoverStyles} ${className}`.trim();
  
  return (
    <div className={cardClasses} {...props}>
      {title && (
        <div className="px-6 py-4 border-b border-gray-200">
          <h3 className="text-lg font-semibold text-gray-900">{title}</h3>
        </div>
      )}
      <div className="p-6">
        {children}
      </div>
    </div>
  );
};

export default Card;
