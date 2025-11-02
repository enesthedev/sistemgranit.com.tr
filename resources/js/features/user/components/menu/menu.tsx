import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { SidebarMenuButton, useSidebar } from '@/components/ui/sidebar';
import { useIsMobile } from '@/hooks/use-mobile';
import { type SharedData } from '@/types';
import { usePage } from '@inertiajs/react';
import { ChevronsUpDown } from 'lucide-react';
import { OnelineProfile } from '../oneline-profile';
import { Actions } from './actions';

export function Menu() {
    const { auth } = usePage<SharedData>().props;
    const { state } = useSidebar();

    const isMobile = useIsMobile();

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <SidebarMenuButton size="lg" className="group text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent">
                    <OnelineProfile user={auth.user} />
                    <ChevronsUpDown className="ml-auto size-4" />
                </SidebarMenuButton>
            </DropdownMenuTrigger>
            <DropdownMenuContent
                className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
                align="end"
                side={isMobile ? 'bottom' : state === 'collapsed' ? 'left' : 'bottom'}
            >
                <Actions user={auth.user} />
            </DropdownMenuContent>
        </DropdownMenu>
    );
}
