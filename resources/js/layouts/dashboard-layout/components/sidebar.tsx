import Logo from '@/components/logo';
import { SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuItem, Sidebar as UISidebar } from '@/components/ui/sidebar';
import { Menu as UserMenu } from '@/features/user/components/menu';
import { type NavItem } from '@/types';
import { LayoutPanelLeft } from 'lucide-react';
import { Navigation } from './navigation';
import { SubNavigation } from './sub-navigation';

const navItems: NavItem[] = [
    {
        title: 'Başlangıç',
        href: route('dashboard.index'),
        icon: LayoutPanelLeft,
    },
];

const footerNavItems: NavItem[] = [
    /**{
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },**/
];

export function Sidebar() {
    return (
        <UISidebar collapsible="offcanvas" className="dark" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <Logo variant="catalog" iconSize="lg" className="pointer-events-none my-2" />
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
