import { cn } from '@/utils';

interface LogoProps {
    variant?: 'general' | 'icon' | 'catalog';
    className?: string;
    iconSize?: 'sm' | 'md' | 'lg';
}

export default function Logo({ variant = 'general', className, iconSize = 'md' }: LogoProps) {
    const generalImageHeightClasses = {
        sm: 'h-6',
        md: 'h-8',
        lg: 'h-10',
    };

    if (variant === 'catalog') {
        return (
            <div className={cn('flex items-start', generalImageHeightClasses[iconSize], className)}>
                <img src="/images/sistem-catalog-logo.png" alt="Katalog Logo" className="h-full w-full object-contain" />
            </div>
        );
    }

    if (variant === 'icon') {
        return (
            <div className="my-5 flex h-12 items-center justify-center">
                <img src="/images/logo-icon.png" alt="Logo" className="h-full w-full object-contain" />
            </div>
        );
    }

    return (
        <div className={cn('flex items-center', className)}>
            <img src="/images/logo.png" alt="Logo" className={cn(generalImageHeightClasses[iconSize], 'w-auto object-contain')} />
        </div>
    );
}
