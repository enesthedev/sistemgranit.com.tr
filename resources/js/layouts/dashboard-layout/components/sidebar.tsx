import Logo from '@/components/logo';
import { SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuItem, Sidebar as UISidebar } from '@/components/ui/sidebar';
import { Menu as UserMenu } from '@/features/user/components/menu';
import { type NavItem } from '@/types';
import { BookOpen, Folder, LayoutGrid } from 'lucide-react';
import { Navigation } from './navigation';
import { SubNavigation } from './sub-navigation';

const navItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard.index'),
        icon: LayoutGrid,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

export function Sidebar() {
    return (
        <UISidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <Logo variant="icon" />
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <Navigation items={navItems} />
            </SidebarContent>

            <SidebarFooter>
                <SubNavigation items={footerNavItems} className="mt-auto" />
                <SidebarMenu>
                    <SidebarMenuItem>
                        <UserMenu />
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarFooter>
        </UISidebar>
    );
}
