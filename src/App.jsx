import { useState } from 'react'
import Sidebar from './components/Sidebar'
import TopBar from './components/TopBar'
import DashboardView from './components/Dashboard'
import ChatView from './components/Chat'
import ProductsView from './components/Products'
import InquiriesView from './components/Inquiries'
import IntegrationsView from './components/Integrations'
import SecurityView from './components/Security'
import SettingsView from './components/Settings'

export default function App() {
  const [route, setRoute] = useState('dashboard')
  const [collapsed, setCollapsed] = useState(false)
  const user = { name: 'Wendy Ang' }

  const titles = {
    dashboard:    { t: 'Dashboard',         s: 'Your chatbot, at a glance' },
    chat:         { t: 'Chat',              s: 'Live conversations' },
    products:     { t: 'Products',          s: 'Catalogue Mindy can answer about' },
    inquiries:    { t: 'Inquiries',         s: 'All conversations and intents' },
    integrations: { t: 'Facebook Connect',  s: 'Manage page & messenger integration' },
    security:     { t: 'Change Password',   s: 'Account security' },
    settings:     { t: 'Settings',          s: 'Workspace preferences' },
  }
  const cur = titles[route] || titles.dashboard

  const views = {
    dashboard:    <DashboardView/>,
    chat:         <ChatView/>,
    products:     <ProductsView/>,
    inquiries:    <InquiriesView/>,
    integrations: <IntegrationsView/>,
    security:     <SecurityView/>,
    settings:     <SettingsView/>,
  }

  return (
    <>
      <Sidebar current={route} onNav={setRoute} collapsed={collapsed} onToggle={() => setCollapsed(c => !c)} />
      <div style={{ flex: 1, display: 'flex', flexDirection: 'column', minWidth: 0 }}>
        <TopBar title={cur.t} subtitle={cur.s} user={user} />
        {views[route] || views.dashboard}
      </div>
    </>
  )
}
