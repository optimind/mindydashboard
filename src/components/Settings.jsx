import { useState } from 'react'
import { Icon } from './Primitives'

function Toggle({ on, onChange }) {
  return (
    <button onClick={() => onChange(!on)} style={{
      width: 44, height: 24, borderRadius: 999, border: 0, cursor: 'pointer',
      background: on ? '#00B5AE' : '#D9E4F5', position: 'relative',
      transition: 'background 150ms', padding: 0, flexShrink: 0,
    }}>
      <span style={{
        position: 'absolute', top: 2, left: on ? 22 : 2,
        width: 20, height: 20, borderRadius: 999, background: '#fff',
        boxShadow: '0 1px 3px rgba(10,46,107,0.2)',
        transition: 'left 200ms cubic-bezier(0.22,1,0.36,1)',
      }}/>
    </button>
  )
}

function Field({ label, description, children }) {
  return (
    <div style={{ display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between', gap: 24, padding: '16px 0', borderBottom: '1px solid #F4F7FC' }}>
      <div style={{ flex: 1 }}>
        <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B' }}>{label}</div>
        {description && <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginTop: 3 }}>{description}</div>}
      </div>
      <div style={{ flexShrink: 0, minWidth: 160 }}>{children}</div>
    </div>
  )
}

function TextInput({ value, onChange, placeholder }) {
  return (
    <input value={value} onChange={e => onChange(e.target.value)} placeholder={placeholder} style={{
      width: '100%', boxSizing: 'border-box', height: 38, padding: '0 12px',
      border: '1px solid #D9E4F5', borderRadius: 8, background: '#FAFBFE',
      font: '500 13px/1 Nunito', color: '#0A2E6B', outline: 'none',
      transition: 'border-color 150ms',
    }}
      onFocus={e => { e.target.style.borderColor = '#00B5AE' }}
      onBlur={e => { e.target.style.borderColor = '#D9E4F5' }}
    />
  )
}

function SelectInput({ value, onChange, options }) {
  return (
    <select value={value} onChange={e => onChange(e.target.value)} style={{
      width: '100%', height: 38, padding: '0 12px',
      border: '1px solid #D9E4F5', borderRadius: 8, background: '#FAFBFE',
      font: '500 13px/1 Nunito', color: '#0A2E6B', outline: 'none', cursor: 'pointer',
    }}>
      {options.map(o => <option key={o.value} value={o.value}>{o.label}</option>)}
    </select>
  )
}

function Section({ title, subtitle, children }) {
  return (
    <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', overflow: 'hidden' }}>
      <div style={{ padding: '20px 24px', borderBottom: '1px solid #F4F7FC' }}>
        <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B' }}>{title}</div>
        {subtitle && <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginTop: 4 }}>{subtitle}</div>}
      </div>
      <div style={{ padding: '0 24px 4px' }}>{children}</div>
    </div>
  )
}

export default function SettingsView() {
  const [workspaceName, setWorkspaceName] = useState('Optimind PH')
  const [timezone, setTimezone] = useState('Asia/Manila')
  const [language, setLanguage] = useState('en')
  const [chatbotName, setChatbotName] = useState('Mindy')
  const [personality, setPersonality] = useState('friendly')
  const [autoReply, setAutoReply] = useState(true)
  const [delay, setDelay] = useState('instant')
  const [emailAlerts, setEmailAlerts] = useState(true)
  const [escAlerts, setEscAlerts] = useState(true)
  const [weeklyReport, setWeeklyReport] = useState(false)
  const [saved, setSaved] = useState(false)

  const handleSave = () => {
    setSaved(true)
    setTimeout(() => setSaved(false), 2500)
  }

  return (
    <div style={{ flex: 1, overflow: 'auto', padding: 28, background: '#F4F7FC', display: 'flex', flexDirection: 'column', gap: 20, maxWidth: 820 }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 12 }}>
        <div style={{ flex: 1 }}>
          <div style={{ font: '800 22px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>Settings</div>
          <div style={{ font: '400 13px/1.4 Nunito', color: '#4B5C82', marginTop: 3 }}>Workspace and chatbot preferences</div>
        </div>
        <div style={{ display: 'flex', alignItems: 'center', gap: 10 }}>
          {saved && <span style={{ font: '600 12px/1 Nunito', color: '#00756F', display: 'flex', alignItems: 'center', gap: 5 }}><Icon name="check" size={13}/> Saved</span>}
          <button onClick={handleSave} style={{ height: 38, padding: '0 20px', borderRadius: 10, border: 0, background: '#0A2E6B', font: '700 13px/1 Nunito', color: '#fff', cursor: 'pointer' }}>
            Save changes
          </button>
        </div>
      </div>

      {/* General */}
      <Section title="General" subtitle="Basic workspace information">
        <Field label="Workspace name" description="The name of your organisation or brand.">
          <TextInput value={workspaceName} onChange={setWorkspaceName} placeholder="Your workspace name"/>
        </Field>
        <Field label="Timezone" description="Used for scheduling and reporting.">
          <SelectInput value={timezone} onChange={setTimezone} options={[
            { value: 'Asia/Manila', label: 'Asia/Manila (GMT+8)' },
            { value: 'Asia/Singapore', label: 'Asia/Singapore (GMT+8)' },
            { value: 'America/New_York', label: 'America/New_York (GMT-5)' },
            { value: 'UTC', label: 'UTC' },
          ]}/>
        </Field>
        <Field label="Language" description="Default language for the chatbot interface.">
          <SelectInput value={language} onChange={setLanguage} options={[
            { value: 'en', label: 'English' },
            { value: 'fil', label: 'Filipino' },
            { value: 'es', label: 'Spanish' },
          ]}/>
        </Field>
      </Section>

      {/* Chatbot behavior */}
      <Section title="Chatbot Behavior" subtitle="Control how Mindy interacts with customers">
        <Field label="Chatbot name" description="The display name shown to customers in Messenger.">
          <TextInput value={chatbotName} onChange={setChatbotName} placeholder="Chatbot name"/>
        </Field>
        <Field label="Personality" description="Tone and style of Mindy's responses.">
          <SelectInput value={personality} onChange={setPersonality} options={[
            { value: 'friendly', label: 'Friendly & casual' },
            { value: 'professional', label: 'Professional & formal' },
            { value: 'concise', label: 'Concise & direct' },
          ]}/>
        </Field>
        <Field label="Auto-reply" description="Automatically respond to all incoming messages.">
          <div style={{ display: 'flex', justifyContent: 'flex-end' }}>
            <Toggle on={autoReply} onChange={setAutoReply}/>
          </div>
        </Field>
        <Field label="Response delay" description="Add a brief pause before Mindy replies to feel more human.">
          <SelectInput value={delay} onChange={setDelay} options={[
            { value: 'instant', label: 'Instant' },
            { value: '1s', label: '~1 second' },
            { value: '2s', label: '~2 seconds' },
            { value: '3s', label: '~3 seconds' },
          ]}/>
        </Field>
      </Section>

      {/* Notifications */}
      <Section title="Notifications" subtitle="Choose when to receive alerts">
        <Field label="Email alerts" description="Receive an email for important events like escalations.">
          <div style={{ display: 'flex', justifyContent: 'flex-end' }}>
            <Toggle on={emailAlerts} onChange={setEmailAlerts}/>
          </div>
        </Field>
        <Field label="Escalation alerts" description="Notify you immediately when a conversation is escalated.">
          <div style={{ display: 'flex', justifyContent: 'flex-end' }}>
            <Toggle on={escAlerts} onChange={setEscAlerts}/>
          </div>
        </Field>
        <Field label="Weekly performance report" description="Summary of conversations, resolution rate, and trends.">
          <div style={{ display: 'flex', justifyContent: 'flex-end' }}>
            <Toggle on={weeklyReport} onChange={setWeeklyReport}/>
          </div>
        </Field>
      </Section>

      {/* Danger zone */}
      <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #FFEEEB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', overflow: 'hidden' }}>
        <div style={{ padding: '20px 24px', borderBottom: '1px solid #FFEEEB' }}>
          <div style={{ font: '800 15px/1 Nunito', color: '#C94E3F' }}>Danger Zone</div>
          <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginTop: 4 }}>Irreversible actions — proceed with caution</div>
        </div>
        <div style={{ padding: '20px 24px', display: 'flex', flexDirection: 'column', gap: 16 }}>
          {[
            { label: 'Reset chatbot data', desc: 'Clears all conversation history and learned responses. Cannot be undone.', btn: 'Reset data' },
            { label: 'Delete workspace', desc: 'Permanently deletes this workspace, all data, and cancels your subscription.', btn: 'Delete workspace' },
          ].map(a => (
            <div key={a.label} style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', gap: 24 }}>
              <div>
                <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B' }}>{a.label}</div>
                <div style={{ font: '400 12px/1.4 Nunito', color: '#7A89A8', marginTop: 3 }}>{a.desc}</div>
              </div>
              <button style={{ height: 36, padding: '0 16px', borderRadius: 8, border: '1px solid #F27262', background: '#fff', font: '700 12px/1 Nunito', color: '#C94E3F', cursor: 'pointer', flexShrink: 0, whiteSpace: 'nowrap' }}>
                {a.btn}
              </button>
            </div>
          ))}
        </div>
      </div>
    </div>
  )
}
