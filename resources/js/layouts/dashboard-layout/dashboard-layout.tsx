import { type BreadcrumbItem } from '@/types';
import { type PropsWithChildren } from 'react';
import { Content, Shell, Sidebar, SidebarHeader } from './components';

export default function DashboardLayout({ children, breadcrumbs = [] }: PropsWithChildren<{ breadcrumbs?: BreadcrumbItem[] }>) {
    return (
        <Shell variant="sidebar">
            <Sidebar />
            <Content variant="sidebar" className="overflow-x-hidden">
                <SidebarHeader breadcrumbs={breadcrumbs} />
                {children}
            </Content>
        </Shell>
    );
}
