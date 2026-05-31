import { useState } from 'react'
import { Icon, Chip } from './Primitives'

function Toggle({ on, onChange, size = 'md' }) {
  const w = size === 'sm' ? 36 : 44
  const h = size === 'sm' ? 20 : 24
  const dot = size === 'sm' ? 14 : 18
  const onPos = size === 'sm' ? 18 : 22
  return (
    <button onClick={() => onChange(!on)} style={{
      width: w, height: h, borderRadius: 999, border: 0, cursor: 'pointer',
      background: on ? '#00B5AE' : '#D9E4F5', position: 'relative',
      transition: 'background 150ms', padding: 0, flexShrink: 0,
    }}>
      <span style={{
        position: 'absolute', top: (h - dot) / 2, left: on ? onPos : (h - dot) / 2,
        width: dot, height: dot, borderRadius: 999, background: '#fff',
        boxShadow: '0 1px 3px rgba(10,46,107,0.2)',
        transition: 'left 180ms cubic-bezier(0.22,1,0.36,1)',
      }}/>
    </button>
  )
}

function Section({ title, children }) {
  return (
    <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', overflow: 'hidden' }}>
      <div style={{ padding: '18px 24px', borderBottom: '1px solid #F4F7FC' }}>
        <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B', letterSpacing: '-0.01em' }}>{title}</div>
      </div>
      <div style={{ padding: '20px 24px', display: 'flex', flexDirection: 'column', gap: 20 }}>
        {children}
      </div>
    </div>
  )
}

function SettingRow({ label, description, children }) {
  return (
    <div style={{ display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between', gap: 24 }}>
      <div style={{ flex: 1 }}>
        <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B' }}>{label}</div>
        {description && <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginTop: 3 }}>{description}</div>}
      </div>
      <div style={{ flexShrink: 0 }}>{children}</div>
    </div>
  )
}

export default function IntegrationsView() {
  const [autoReply, setAutoReply] = useState(true)
  const [typing, setTyping] = useState(true)
  const [readReceipts, setReadReceipts] = useState(false)
  const [greeting, setGreeting] = useState("Hi! I'm Mindy, your virtual assistant. How can I help you today?")

  return (
    <div style={{ flex: 1, overflow: 'auto', padding: 28, background: '#F4F7FC', display: 'flex', flexDirection: 'column', gap: 20, maxWidth: 860 }}>
      <div>
        <div style={{ font: '800 22px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>Facebook Connect</div>
        <div style={{ font: '400 13px/1.4 Nunito', color: '#4B5C82', marginTop: 3 }}>Manage your Facebook Page and Messenger integration</div>
      </div>

      {/* Connection status card */}
      <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', padding: 24 }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: 16 }}>
          {/* Facebook logo placeholder */}
          <div style={{ width: 52, height: 52, borderRadius: 14, background: '#1877F2', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="white">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </div>
          <div style={{ flex: 1 }}>
            <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
              <div style={{ font: '800 16px/1 Nunito', color: '#0A2E6B' }}>Optimind PH</div>
              <span style={{ background: '#E0F7F5', color: '#00756F', borderRadius: 6, font: '700 11px/1 Nunito', padding: '3px 8px', display: 'inline-flex', alignItems: 'center', gap: 5 }}>
                <span style={{ width: 6, height: 6, borderRadius: 999, background: '#00B5AE' }}/>
                Connected
              </span>
            </div>
            <div style={{ font: '500 12px/1.4 Nunito', color: '#7A89A8', marginTop: 4 }}>
              Facebook Page · Page ID: 1209384756 · Last synced 4m ago
            </div>
          </div>
          <div style={{ display: 'flex', gap: 8 }}>
            <button style={{ height: 34, padding: '0 14px', borderRadius: 8, border: '1px solid #E2EAF4', background: '#fff', font: '700 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer', display: 'inline-flex', alignItems: 'center', gap: 6 }}>
              <Icon name="settings" size={13}/> Configure
            </button>
            <button style={{ height: 34, padding: '0 14px', borderRadius: 8, border: '1px solid #FFEEEB', background: '#FFEEEB', font: '700 12px/1 Nunito', color: '#C94E3F', cursor: 'pointer' }}>
              Disconnect
            </button>
          </div>
        </div>

        {/* Webhook status */}
        <div style={{ marginTop: 20, padding: 16, background: '#F4F7FC', borderRadius: 10, display: 'flex', alignItems: 'center', gap: 12 }}>
          <div style={{ width: 32, height: 32, borderRadius: 8, background: '#E0F7F5', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
            <Icon name="bolt" size={15} style={{ color: '#00756F' }}/>
          </div>
          <div style={{ flex: 1 }}>
            <div style={{ font: '700 12px/1 Nunito', color: '#0A2E6B' }}>Webhook active</div>
            <div style={{ font: '500 11px/1 Nunito', color: '#7A89A8', marginTop: 3 }}>
              https://mindy.ai/webhook/fb/opt-1209384756 · Last event: 4m ago
            </div>
          </div>
          <span style={{ font: '600 11px/1 Nunito', color: '#00756F', background: '#E0F7F5', borderRadius: 6, padding: '4px 10px' }}>Healthy</span>
        </div>
      </div>

      {/* Messenger settings */}
      <Section title="Messenger Settings">
        <SettingRow label="Auto-reply" description="Let Mindy respond to all incoming Messenger messages automatically.">
          <Toggle on={autoReply} onChange={setAutoReply}/>
        </SettingRow>
        <SettingRow label="Typing indicator" description="Show a typing animation while Mindy is generating a response.">
          <Toggle on={typing} onChange={setTyping}/>
        </SettingRow>
        <SettingRow label="Read receipts" description="Mark messages as seen when Mindy reads them.">
          <Toggle on={readReceipts} onChange={setReadReceipts}/>
        </SettingRow>
        <div>
          <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B', marginBottom: 8 }}>Greeting message</div>
          <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginBottom: 10 }}>Sent to users the first time they open a conversation with your page.</div>
          <textarea value={greeting} onChange={e => setGreeting(e.target.value)} rows={3} style={{
            width: '100%', boxSizing: 'border-box', padding: '10px 14px',
            border: '1px solid #D9E4F5', borderRadius: 10,
            font: '400 13px/1.5 Nunito', color: '#0A2E6B', resize: 'vertical',
            outline: 'none', transition: 'border-color 150ms',
            background: '#FAFBFE',
          }}
            onFocus={e => e.target.style.borderColor = '#00B5AE'}
            onBlur={e => e.target.style.borderColor = '#D9E4F5'}
          />
          <div style={{ display: 'flex', justifyContent: 'flex-end', marginTop: 12 }}>
            <button style={{ height: 36, padding: '0 18px', borderRadius: 8, border: 0, background: '#0A2E6B', font: '700 12px/1 Nunito', color: '#fff', cursor: 'pointer' }}>
              Save changes
            </button>
          </div>
        </div>
      </Section>

      {/* Page permissions */}
      <Section title="Page Permissions">
        {[
          { label: 'pages_messaging', desc: 'Send and receive messages on behalf of your Page', granted: true },
          { label: 'pages_read_engagement', desc: 'Read content posted on the Page', granted: true },
          { label: 'pages_manage_metadata', desc: 'Subscribe to webhooks for the Page', granted: true },
          { label: 'pages_show_list', desc: 'Access the list of Pages you manage', granted: false },
        ].map(p => (
          <div key={p.label} style={{ display: 'flex', alignItems: 'center', gap: 12 }}>
            <div style={{
              width: 28, height: 28, borderRadius: 6, flexShrink: 0,
              background: p.granted ? '#E0F7F5' : '#FFEEEB',
              display: 'flex', alignItems: 'center', justifyContent: 'center',
            }}>
              <Icon name={p.granted ? 'check' : 'x'} size={13} style={{ color: p.granted ? '#00756F' : '#C94E3F' }}/>
            </div>
            <div style={{ flex: 1 }}>
              <div style={{ font: '600 12px/1 JetBrains Mono', color: '#0A2E6B' }}>{p.label}</div>
              <div style={{ font: '400 11px/1.4 Nunito', color: '#7A89A8', marginTop: 3 }}>{p.desc}</div>
            </div>
            <span style={{
              font: '600 10px/1 Nunito', padding: '3px 8px', borderRadius: 6,
              background: p.granted ? '#E0F7F5' : '#FFEEEB',
              color: p.granted ? '#00756F' : '#C94E3F',
            }}>{p.granted ? 'Granted' : 'Missing'}</span>
          </div>
        ))}
      </Section>
    </div>
  )
}
