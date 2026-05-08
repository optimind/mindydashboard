import { useState } from 'react'

export function Icon({ name, size = 20, stroke = 2, style = {} }) {
  const paths = {
    message: <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>,
    inbox: <><path d="M22 12h-6l-2 3h-4l-2-3H2"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></>,
    book: <><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></>,
    settings: <><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h0a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h0a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v0a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></>,
    bell: <><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></>,
    search: <><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></>,
    send: <><path d="m22 2-7 20-4-9-9-4z"/><path d="M22 2 11 13"/></>,
    plus: <><path d="M12 5v14M5 12h14"/></>,
    paperclip: <path d="m21.44 11.05-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/>,
    check: <path d="M20 6 9 17l-5-5"/>,
    x: <><path d="M18 6 6 18M6 6l12 12"/></>,
    alert: <><path d="M12 9v4M12 17h.01M10.3 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></>,
    calendar: <><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></>,
    chart: <><path d="M3 3v18h18"/><path d="m7 14 4-4 4 4 5-5"/></>,
    users: <><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></>,
    bolt: <path d="M13 2 3 14h9l-1 8 10-12h-9z"/>,
    more: <><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></>,
    arrowRight: <><path d="M5 12h14M12 5l7 7-7 7"/></>,
    clock: <><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 2"/></>,
    shield: <path d="M12 2 3 7v6c0 5 3.8 9.7 9 11 5.2-1.3 9-6 9-11V7z"/>,
    phone: <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>,
    mail: <><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></>,
  }
  return (
    <svg width={size} height={size} viewBox="0 0 24 24" fill="none"
      stroke="currentColor" strokeWidth={stroke} strokeLinecap="round" strokeLinejoin="round" style={style}>
      {paths[name]}
    </svg>
  )
}

export function Button({ variant = 'primary', size = 'md', children, icon, onClick, disabled, style = {} }) {
  const variants = {
    primary: { background: 'var(--color-navy-800)', color: '#fff' },
    accent:  { background: 'var(--color-teal-600)', color: '#fff' },
    ghost:   { background: 'transparent', color: 'var(--color-navy-800)' },
    danger:  { background: 'var(--color-coral-600)', color: '#fff' },
  }
  const sizes = {
    sm: { height: 32, padding: '0 14px', fontSize: 13 },
    md: { height: 40, padding: '0 18px', fontSize: 14 },
  }
  return (
    <button onClick={onClick} disabled={disabled} style={{
      display: 'inline-flex', alignItems: 'center', justifyContent: 'center', gap: 8,
      border: 0, borderRadius: 999, fontWeight: 700, fontFamily: 'Nunito, sans-serif',
      cursor: disabled ? 'not-allowed' : 'pointer', opacity: disabled ? 0.4 : 1,
      transition: 'background 150ms, transform 150ms',
      ...variants[variant], ...sizes[size], ...style,
    }}>
      {icon && <Icon name={icon} size={size === 'sm' ? 14 : 16} stroke={2.2} />}
      {children}
    </button>
  )
}

export function Chip({ variant = 'info', children, dot = true }) {
  const v = {
    success: { background: '#E0F7F5', color: '#00756F' },
    warning: { background: '#FFF6E3', color: '#C98A2E' },
    danger:  { background: '#FFEEEB', color: '#C94E3F' },
    info:    { background: '#E8F0FB', color: '#0A2E6B' },
  }[variant]
  return (
    <span style={{
      display: 'inline-flex', alignItems: 'center', gap: 6,
      height: 22, padding: '0 8px', borderRadius: 6,
      fontWeight: 700, fontSize: 11, fontFamily: 'Nunito', ...v,
    }}>
      {dot && <span style={{ width: 6, height: 6, borderRadius: 999, background: 'currentColor' }}/>}
      {children}
    </span>
  )
}

export function Avatar({ src, name, size = 36, status, bob = false }) {
  const style = {
    width: size, height: size, borderRadius: 999, flexShrink: 0, position: 'relative',
    background: 'var(--color-navy-400)', color: '#fff',
    display: 'flex', alignItems: 'center', justifyContent: 'center',
    fontWeight: 800, fontSize: size * 0.38,
    animation: bob ? 'mindy-bob 3s ease-in-out infinite' : undefined,
  }
  const initials = name ? name.split(' ').map(s => s[0]).join('').slice(0, 2).toUpperCase() : '?'
  const statusColor = { online: '#00B5AE', idle: '#F5B44F', offline: '#A8B3C7' }[status]
  return (
    <div style={style}>
      {src ? <img src={src} width={size} height={size} style={{ borderRadius: 999 }} /> : initials}
      {status && <span style={{
        position: 'absolute', right: -1, bottom: -1, width: Math.max(10, size * 0.3), height: Math.max(10, size * 0.3),
        borderRadius: 999, border: '2px solid #fff', background: statusColor,
      }}/>}
    </div>
  )
}
