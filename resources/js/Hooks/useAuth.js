import { usePage } from '@inertiajs/react';

/**
 * useAuth Hook
 * Custom hook để truy cập thông tin authentication
 * 
 * @returns {Object} Auth information
 * @returns {Object|null} user - User object nếu đã đăng nhập
 * @returns {boolean} isAuthenticated - True nếu user đã đăng nhập
 * @returns {boolean} isGuest - True nếu user chưa đăng nhập
 */
export const useAuth = () => {
  const { auth } = usePage().props;
  
  return {
    user: auth?.user || null,
    isAuthenticated: !!auth?.user,
    isGuest: !auth?.user,
  };
};

export default useAuth;
