import { useState } from 'react'
import { Icon } from './Primitives'

function PasswordField({ label, value, onChange, placeholder }) {
  const [show, setShow] = useState(false)
  return (
    <div>
      <label style={{ display: 'block', font: '700 12px/1 Nunito', color: '#4B5C82', marginBottom: 8, letterSpacing: '0.04em', textTransform: 'uppercase', fontSize: 11 }}>
        {label}
      </label>
      <div style={{ position: 'relative' }}>
        <input
          type={show ? 'text' : 'password'}
          value={value}
          onChange={e => onChange(e.target.value)}
          placeholder={placeholder}
          style={{
            width: '100%', boxSizing: 'border-box',
            height: 44, padding: '0 44px 0 14px',
            border: '1px solid #D9E4F5', borderRadius: 10,
            font: '400 14px/1 Nunito', color: '#0A2E6B',
            background: '#FAFBFE', outline: 'none',
            transition: 'border-color 150ms, box-shadow 150ms',
          }}
          onFocus={e => { e.target.style.borderColor = '#00B5AE'; e.target.style.boxShadow = '0 0 0 3px #E0F7F5' }}
          onBlur={e => { e.target.style.borderColor = '#D9E4F5'; e.target.style.boxShadow = 'none' }}
        />
        <button onClick={() => setShow(s => !s)} style={{
          position: 'absolute', right: 12, top: '50%', transform: 'translateY(-50%)',
          background: 'none', border: 0, cursor: 'pointer', color: '#A8B3C7', padding: 4,
        }}>
          {show
            ? <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
            : <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          }
        </button>
      </div>
    </div>
  )
}

function StrengthBar({ password }) {
  const score = (() => {
    if (!password) return 0
    let s = 0
    if (password.length >= 8)  s++
    if (password.length >= 12) s++
    if (/[A-Z]/.test(password)) s++
    if (/[0-9]/.test(password)) s++
    if (/[^A-Za-z0-9]/.test(password)) s++
    return s
  })()

  const levels = [
    { label: 'Too short',  color: '#F27262' },
    { label: 'Weak',       color: '#F27262' },
    { label: 'Fair',       color: '#F5B44F' },
    { label: 'Good',       color: '#F5B44F' },
    { label: 'Strong',     color: '#00B5AE' },
    { label: 'Very strong', color: '#00756F' },
  ]
  const level = levels[Math.min(score, levels.length - 1)]

  if (!password) return null
  return (
    <div style={{ marginTop: 8 }}>
      <div style={{ display: 'flex', gap: 4, marginBottom: 6 }}>
        {[1,2,3,4,5].map(i => (
          <div key={i} style={{ flex: 1, height: 4, borderRadius: 999, background: i <= score ? level.color : '#E2EAF4', transition: 'background 200ms' }}/>
        ))}
      </div>
      <div style={{ font: '600 11px/1 Nunito', color: level.color }}>{level.label}</div>
    </div>
  )
}

export default function SecurityView() {
  const [current, setCurrent] = useState('')
  const [newPass, setNewPass] = useState('')
  const [confirm, setConfirm] = useState('')
  const [saved, setSaved] = useState(false)

  const mismatch = confirm && newPass !== confirm
  const canSave = current && newPass.length >= 8 && newPass === confirm

  const handleSave = () => {
    if (!canSave) return
    setSaved(true)
    setCurrent(''); setNewPass(''); setConfirm('')
    setTimeout(() => setSaved(false), 3000)
  }

  return (
    <div style={{ flex: 1, overflow: 'auto', padding: 28, background: '#F4F7FC', display: 'flex', flexDirection: 'column', gap: 20 }}>
      <div>
        <div style={{ font: '800 22px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>Change Password</div>
        <div style={{ font: '400 13px/1.4 Nunito', color: '#4B5C82', marginTop: 3 }}>Keep your account secure with a strong password</div>
      </div>

      <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 20, alignItems: 'start' }}>
        {/* Password form */}
        <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', padding: 28, display: 'flex', flexDirection: 'column', gap: 20 }}>
          <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B', marginBottom: 4 }}>Update password</div>

          <PasswordField label="Current password" value={current} onChange={setCurrent} placeholder="Enter your current password"/>

          <div style={{ height: 1, background: '#F4F7FC' }}/>

          <div>
            <PasswordField label="New password" value={newPass} onChange={setNewPass} placeholder="At least 8 characters"/>
            <StrengthBar password={newPass}/>
          </div>

          <div>
            <PasswordField label="Confirm new password" value={confirm} onChange={setConfirm} placeholder="Repeat new password"/>
            {mismatch && <div style={{ marginTop: 6, font: '600 11px/1 Nunito', color: '#C94E3F', display: 'flex', alignItems: 'center', gap: 5 }}>
              <Icon name="x" size={12}/> Passwords don't match
            </div>}
            {confirm && !mismatch && newPass && <div style={{ marginTop: 6, font: '600 11px/1 Nunito', color: '#00756F', display: 'flex', alignItems: 'center', gap: 5 }}>
              <Icon name="check" size={12}/> Passwords match
            </div>}
          </div>

          <div style={{ display: 'flex', justifyContent: 'flex-end', gap: 10, paddingTop: 4 }}>
            {saved && (
              <div style={{ display: 'flex', alignItems: 'center', gap: 6, font: '600 12px/1 Nunito', color: '#00756F' }}>
                <Icon name="check" size={14}/> Password updated
              </div>
            )}
            <button onClick={handleSave} disabled={!canSave} style={{
              height: 40, padding: '0 24px', borderRadius: 10, border: 0,
              background: canSave ? '#0A2E6B' : '#D9E4F5',
              color: canSave ? '#fff' : '#A8B3C7',
              font: '700 13px/1 Nunito', cursor: canSave ? 'pointer' : 'not-allowed',
              transition: 'background 150ms',
            }}>
              Save changes
            </button>
          </div>
        </div>

        {/* Security info panel */}
        <div style={{ display: 'flex', flexDirection: 'column', gap: 16 }}>
          {/* Account info */}
          <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', padding: 20 }}>
            <div style={{ font: '700 13px/1 Nunito', color: '#0A2E6B', marginBottom: 14 }}>Account</div>
            {[
              { label: 'Email', value: 'wsang@myoptimind.com' },
              { label: 'Last password change', value: '90 days ago' },
              { label: 'Account created', value: 'March 3, 2026' },
            ].map(r => (
              <div key={r.label} style={{ display: 'flex', justifyContent: 'space-between', padding: '10px 0', borderBottom: '1px solid #F4F7FC' }}>
                <span style={{ font: '500 12px/1 Nunito', color: '#7A89A8' }}>{r.label}</span>
                <span style={{ font: '600 12px/1 Nunito', color: '#0A2E6B' }}>{r.value}</span>
              </div>
            ))}
          </div>

          {/* Password tips */}
          <div style={{ background: '#E8F0FB', borderRadius: 16, padding: 20 }}>
            <div style={{ display: 'flex', gap: 10, marginBottom: 12 }}>
              <Icon name="shield" size={18} style={{ color: '#0A2E6B', flexShrink: 0 }}/>
              <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B' }}>Tips for a strong password</div>
            </div>
            {[
              'At least 12 characters long',
              'Mix uppercase and lowercase letters',
              'Include numbers and symbols',
              'Avoid names, birthdays, or common words',
              'Use a unique password for this account',
            ].map((tip, i) => (
              <div key={i} style={{ display: 'flex', alignItems: 'flex-start', gap: 8, marginTop: 8 }}>
                <span style={{ width: 16, height: 16, borderRadius: 999, background: '#0A2E6B', color: '#fff', font: '700 9px/16px Nunito', textAlign: 'center', flexShrink: 0, marginTop: 1 }}>{i + 1}</span>
                <span style={{ font: '500 12px/1.4 Nunito', color: '#4B5C82' }}>{tip}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  )
}
