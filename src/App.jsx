import { useState } from 'react'
import Sidebar from './components/Sidebar'
import TopBar from './components/TopBar'
import DashboardView from './components/Dashboard'

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

  return (
    <>
      <Sidebar current={route} onNav={setRoute} collapsed={collapsed} onToggle={() => setCollapsed(c => !c)} />
      <div style={{ flex: 1, display: 'flex', flexDirection: 'column', minWidth: 0 }}>
        <TopBar title={cur.t} subtitle={cur.s} user={user} />
        {route === 'dashboard' ? (
          <DashboardView/>
        ) : (
          <div style={{
            flex: 1, display: 'flex', alignItems: 'center', justifyContent: 'center',
            flexDirection: 'column', gap: 12, color: '#4B5C82', padding: 40,
          }}>
            <img src="/assets/mindy-avatar.png" width={120} style={{ borderRadius: 999, opacity: 0.85 }}/>
            <div style={{ font: '800 22px/1.2 Nunito', color: '#0A2E6B' }}>{cur.t}</div>
            <div style={{ font: '400 14px/1.4 Nunito' }}>This view is in the kit — not wired up in this demo.</div>
          </div>
        )}
      </div>
    </>
  )
}
