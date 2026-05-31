import { useState, useRef, useEffect } from 'react'
import { Icon, Chip } from './Primitives'

const CONVERSATIONS = [
  {
    id: 0, name: 'Priya Shah', channel: 'Messenger', status: 'active', unread: 2,
    time: '2m ago', preview: 'Yes please! Can I reserve it under Priya Shah?',
    avatar: '#6B8ED6',
  },
  {
    id: 1, name: 'Diego Fuentes', channel: 'Messenger', status: 'active', unread: 1,
    time: '5m ago', preview: 'What time does the BGC branch close today?',
    avatar: '#00B5AE',
  },
  {
    id: 2, name: 'Eliza Nguyen', channel: 'Messenger', status: 'active', unread: 0,
    time: '8m ago', preview: 'Is the buy-1-take-1 promo still available?',
    avatar: '#F5B44F',
  },
  {
    id: 3, name: 'Jules Carter', channel: 'Messenger', status: 'escalated', unread: 0,
    time: '1h ago', preview: 'I want a full refund for my order #4821',
    avatar: '#F27262',
  },
  {
    id: 4, name: 'Marcus Hill', channel: 'Messenger', status: 'resolved', unread: 0,
    time: '15m ago', preview: 'Thanks for the confirmation! Really helpful.',
    avatar: '#0A2E6B',
  },
  {
    id: 5, name: 'Ryan Santos', channel: 'Messenger', status: 'resolved', unread: 0,
    time: '2h ago', preview: 'Got it, thank you so much!',
    avatar: '#9FB5E3',
  },
]

const MESSAGES = {
  0: [
    { from: 'user',  text: 'Hi! Do you have the red floral dress in size S?', time: '2:01p' },
    { from: 'mindy', text: 'Hi Priya! Let me check our inventory for you 😊', time: '2:01p' },
    { from: 'mindy', text: 'Great news! The Red Floral Wrap Dress (SKU #RF-2204) is available in Size S, priced at ₱1,299.', time: '2:01p' },
    { from: 'user',  text: 'Perfect! Is it available for same-day pickup at the Makati branch?', time: '2:02p' },
    { from: 'mindy', text: 'Yes! The Makati branch currently has 3 units in stock. Store hours are 10AM–9PM daily. Would you like me to reserve one for you?', time: '2:02p' },
    { from: 'user',  text: 'Yes please! Can I reserve it under Priya Shah?', time: '2:03p' },
    { from: 'mindy', text: 'Done! I\'ve reserved 1 unit of the Red Floral Wrap Dress (Size S) under Priya Shah at our Makati branch. Your reservation is valid until closing today at 9PM 🎉', time: '2:03p' },
  ],
  1: [
    { from: 'user',  text: 'Hello! What time does the BGC branch close today?', time: '1:58p' },
    { from: 'mindy', text: 'Hi Diego! The BGC branch is open until 9PM today. Is there anything else I can help you with?', time: '1:58p' },
    { from: 'user',  text: 'What time does the BGC branch close today?', time: '2:00p' },
  ],
  2: [
    { from: 'user',  text: 'Hi, is the buy-1-take-1 promo still available?', time: '1:55p' },
    { from: 'mindy', text: 'Hi Eliza! Yes, our Buy-1-Take-1 promo on selected tops is still running until May 31. Would you like to know which items are included?', time: '1:55p' },
    { from: 'user',  text: 'Is the buy-1-take-1 promo still available?', time: '1:57p' },
  ],
  3: [
    { from: 'user',  text: 'I want a full refund for my order #4821. The item was damaged when it arrived.', time: '1:10p' },
    { from: 'mindy', text: 'Hi Jules, I\'m really sorry to hear about that. I can see order #4821 in our system. For damaged items, I\'ll need to escalate this to our customer care team who can process your refund. Is that okay?', time: '1:10p' },
    { from: 'user',  text: 'Yes please, I want a full refund for my order #4821', time: '1:13p' },
    { from: 'system', text: 'Escalated to human agent — refund request flagged for review', time: '1:13p' },
  ],
  4: [
    { from: 'user',  text: 'Can you send me my order confirmation for #3309?', time: '1:44p' },
    { from: 'mindy', text: 'Of course! I\'ve resent the order confirmation for #3309 to your registered email. It should arrive within a few minutes.', time: '1:45p' },
    { from: 'user',  text: 'Got it, I can see it now!', time: '1:46p' },
    { from: 'mindy', text: 'Great! Is there anything else I can help you with?', time: '1:46p' },
    { from: 'user',  text: 'Thanks for the confirmation! Really helpful.', time: '1:47p' },
  ],
  5: [
    { from: 'user',  text: 'What are your store locations in Quezon City?', time: '11:20a' },
    { from: 'mindy', text: 'We have 2 branches in Quezon City: (1) SM North EDSA, Level 3 — open 10AM–9PM, and (2) Trinoma Mall, Ground Floor — open 10AM–9PM.', time: '11:21a' },
    { from: 'user',  text: 'Got it, thank you so much!', time: '11:22a' },
  ],
}

const STATUS_STYLES = {
  active:    { label: 'Active',    bg: '#E0F7F5', color: '#00756F', dot: '#00B5AE' },
  escalated: { label: 'Escalated', bg: '#FFF6E3', color: '#C98A2E', dot: '#F5B44F' },
  resolved:  { label: 'Resolved',  bg: '#F4F7FC', color: '#4B5C82', dot: '#A8B3C7' },
}

function Initials({ name, bg, size = 36 }) {
  const initials = name.split(' ').map(s => s[0]).join('').slice(0, 2).toUpperCase()
  return (
    <div style={{
      width: size, height: size, borderRadius: 999, flexShrink: 0,
      background: bg, color: '#fff',
      display: 'flex', alignItems: 'center', justifyContent: 'center',
      fontWeight: 800, fontSize: size * 0.36, fontFamily: 'Nunito',
    }}>{initials}</div>
  )
}

export default function ChatView() {
  const [selected, setSelected] = useState(0)
  const [filter, setFilter] = useState('All')
  const [input, setInput] = useState('')
  const bottomRef = useRef(null)

  const filters = ['All', 'Active', 'Escalated', 'Resolved']

  const filtered = CONVERSATIONS.filter(c => {
    if (filter === 'All') return true
    return c.status === filter.toLowerCase()
  })

  const conv = CONVERSATIONS[selected]
  const messages = MESSAGES[selected] || []

  useEffect(() => {
    bottomRef.current?.scrollIntoView({ behavior: 'smooth' })
  }, [selected])

  return (
    <div style={{ flex: 1, display: 'flex', overflow: 'hidden', background: '#F4F7FC' }}>

      {/* ── Conversation list ── */}
      <div style={{
        width: 320, flexShrink: 0, background: '#fff',
        borderRight: '1px solid #E2EAF4',
        display: 'flex', flexDirection: 'column',
      }}>
        {/* List header */}
        <div style={{ padding: '16px 16px 12px', borderBottom: '1px solid #F4F7FC' }}>
          <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B', marginBottom: 12 }}>
            Conversations
            <span style={{
              marginLeft: 8, background: '#F27262', color: '#fff',
              borderRadius: 999, font: '700 11px/1 Nunito',
              padding: '2px 7px',
            }}>3</span>
          </div>
          {/* Search */}
          <div style={{
            display: 'flex', alignItems: 'center', gap: 8,
            height: 34, padding: '0 10px', background: '#F4F7FC',
            borderRadius: 8, border: '1px solid #E2EAF4',
          }}>
            <Icon name="search" size={14} style={{ color: '#A8B3C7' }}/>
            <input placeholder="Search conversations…" style={{
              flex: 1, border: 0, background: 'transparent', outline: 'none',
              font: '400 12px/1 Nunito', color: '#0A2E6B',
            }}/>
          </div>
          {/* Filter tabs */}
          <div style={{ display: 'flex', gap: 4, marginTop: 10 }}>
            {filters.map(f => (
              <button key={f} onClick={() => setFilter(f)} style={{
                height: 26, padding: '0 10px', border: 0, borderRadius: 6,
                background: filter === f ? '#0A2E6B' : 'transparent',
                color: filter === f ? '#fff' : '#7A89A8',
                font: `${filter === f ? 700 : 600} 11px/1 Nunito`,
                cursor: 'pointer', transition: 'all 150ms',
              }}>{f}</button>
            ))}
          </div>
        </div>

        {/* List items */}
        <div style={{ flex: 1, overflowY: 'auto' }}>
          {filtered.map(c => {
            const st = STATUS_STYLES[c.status]
            const active = c.id === selected
            return (
              <button key={c.id} onClick={() => setSelected(c.id)} style={{
                width: '100%', padding: '12px 16px', border: 0, textAlign: 'left',
                background: active ? '#F4F7FC' : 'transparent',
                borderLeft: active ? '3px solid #00B5AE' : '3px solid transparent',
                cursor: 'pointer', display: 'flex', gap: 10, alignItems: 'flex-start',
                transition: 'background 150ms',
              }}
                onMouseEnter={e => { if (!active) e.currentTarget.style.background = '#FAFBFE' }}
                onMouseLeave={e => { if (!active) e.currentTarget.style.background = 'transparent' }}
              >
                <div style={{ position: 'relative', flexShrink: 0 }}>
                  <Initials name={c.name} bg={c.avatar} size={38}/>
                  <span style={{
                    position: 'absolute', bottom: 0, right: 0,
                    width: 10, height: 10, borderRadius: 999,
                    background: st.dot, border: '2px solid #fff',
                  }}/>
                </div>
                <div style={{ flex: 1, minWidth: 0 }}>
                  <div style={{ display: 'flex', alignItems: 'center', gap: 6, marginBottom: 3 }}>
                    <div style={{ font: '700 13px/1 Nunito', color: '#0A2E6B', flex: 1, overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>{c.name}</div>
                    <div style={{ font: '500 10px/1 Nunito', color: '#A8B3C7', whiteSpace: 'nowrap' }}>{c.time}</div>
                  </div>
                  <div style={{ font: '500 11px/1.4 Nunito', color: '#7A89A8', overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>{c.preview}</div>
                  <div style={{ display: 'flex', alignItems: 'center', gap: 6, marginTop: 5 }}>
                    <span style={{ font: '600 10px/1 Nunito', color: '#A8B3C7', background: '#F4F7FC', borderRadius: 4, padding: '2px 6px' }}>
                      {c.channel}
                    </span>
                    <span style={{ font: '600 10px/1 Nunito', color: st.color, background: st.bg, borderRadius: 4, padding: '2px 6px' }}>
                      {st.label}
                    </span>
                    {c.unread > 0 && (
                      <span style={{ marginLeft: 'auto', background: '#F27262', color: '#fff', borderRadius: 999, font: '700 10px/1 Nunito', padding: '2px 6px' }}>{c.unread}</span>
                    )}
                  </div>
                </div>
              </button>
            )
          })}
        </div>
      </div>

      {/* ── Chat window ── */}
      <div style={{ flex: 1, display: 'flex', flexDirection: 'column', minWidth: 0 }}>

        {/* Chat header */}
        <div style={{
          height: 64, flexShrink: 0, background: '#fff',
          borderBottom: '1px solid #E2EAF4',
          display: 'flex', alignItems: 'center', gap: 12, padding: '0 24px',
        }}>
          <Initials name={conv.name} bg={conv.avatar} size={36}/>
          <div style={{ flex: 1 }}>
            <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
              <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B' }}>{conv.name}</div>
              <span style={{
                font: '600 10px/1 Nunito',
                color: STATUS_STYLES[conv.status].color,
                background: STATUS_STYLES[conv.status].bg,
                borderRadius: 4, padding: '2px 6px',
              }}>{STATUS_STYLES[conv.status].label}</span>
            </div>
            <div style={{ font: '500 11px/1 Nunito', color: '#A8B3C7', marginTop: 4 }}>
              via {conv.channel} · {conv.time}
            </div>
          </div>
          <div style={{ display: 'flex', gap: 8 }}>
            {conv.status === 'escalated' && (
              <button style={{
                height: 32, padding: '0 14px', borderRadius: 8,
                border: 0, background: '#0A2E6B', color: '#fff',
                font: '700 12px/1 Nunito', cursor: 'pointer',
                display: 'inline-flex', alignItems: 'center', gap: 6,
              }}>
                <Icon name="users" size={13}/> Take over
              </button>
            )}
            <button style={{
              height: 32, padding: '0 14px', borderRadius: 8,
              border: '1px solid #E2EAF4', background: '#fff',
              font: '700 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
              display: 'inline-flex', alignItems: 'center', gap: 6,
            }}>
              <Icon name="check" size={13}/> Resolve
            </button>
            <button style={{
              width: 32, height: 32, borderRadius: 8,
              border: '1px solid #E2EAF4', background: '#fff',
              display: 'flex', alignItems: 'center', justifyContent: 'center',
              color: '#4B5C82', cursor: 'pointer',
            }}>
              <Icon name="more" size={16}/>
            </button>
          </div>
        </div>

        {/* Messages */}
        <div style={{ flex: 1, overflowY: 'auto', padding: '20px 24px', display: 'flex', flexDirection: 'column', gap: 12 }}>
          {messages.map((msg, i) => {
            if (msg.from === 'system') {
              return (
                <div key={i} style={{ display: 'flex', justifyContent: 'center', margin: '4px 0' }}>
                  <div style={{
                    background: '#FFF6E3', color: '#C98A2E', borderRadius: 8,
                    font: '600 11px/1.4 Nunito', padding: '6px 12px',
                    display: 'flex', alignItems: 'center', gap: 6,
                  }}>
                    <Icon name="alert" size={12} style={{ color: '#C98A2E' }}/>
                    {msg.text}
                    <span style={{ color: '#A8B3C7', font: '500 10px/1 Nunito', marginLeft: 4 }}>{msg.time}</span>
                  </div>
                </div>
              )
            }
            const isMindy = msg.from === 'mindy'
            return (
              <div key={i} style={{ display: 'flex', gap: 8, justifyContent: isMindy ? 'flex-end' : 'flex-start', alignItems: 'flex-end' }}>
                {!isMindy && <Initials name={conv.name} bg={conv.avatar} size={28}/>}
                <div style={{ maxWidth: '65%' }}>
                  <div style={{
                    padding: '10px 14px', borderRadius: isMindy ? '16px 16px 4px 16px' : '16px 16px 16px 4px',
                    background: isMindy ? '#0A2E6B' : '#fff',
                    color: isMindy ? '#fff' : '#0A2E6B',
                    font: '500 13px/1.5 Nunito',
                    border: isMindy ? 'none' : '1px solid #E2EAF4',
                    boxShadow: isMindy ? 'none' : '0 1px 2px rgba(10,46,107,0.04)',
                  }}>{msg.text}</div>
                  <div style={{ font: '500 10px/1 Nunito', color: '#A8B3C7', marginTop: 4, textAlign: isMindy ? 'right' : 'left' }}>
                    {isMindy && <><span style={{ color: '#00B5AE' }}>Mindy</span> · </>}{msg.time}
                  </div>
                </div>
                {isMindy && (
                  <div style={{
                    width: 28, height: 28, borderRadius: 999, flexShrink: 0,
                    background: '#00B5AE', display: 'flex', alignItems: 'center', justifyContent: 'center',
                  }}>
                    <Icon name="bolt" size={14} style={{ color: '#fff' }}/>
                  </div>
                )}
              </div>
            )
          })}
          <div ref={bottomRef}/>
        </div>

        {/* Input bar */}
        <div style={{
          borderTop: '1px solid #E2EAF4', background: '#fff', padding: '12px 24px',
          display: 'flex', gap: 10, alignItems: 'flex-end',
        }}>
          <div style={{
            flex: 1, minHeight: 40, maxHeight: 120, padding: '10px 14px',
            background: '#F4F7FC', borderRadius: 12, border: '1px solid #E2EAF4',
            font: '400 13px/1.5 Nunito', color: '#7A89A8',
            display: 'flex', alignItems: 'center',
          }}>
            Mindy handles responses automatically — intervene by taking over the conversation
          </div>
          <button style={{
            width: 40, height: 40, borderRadius: 12, border: 0,
            background: conv.status === 'escalated' ? '#0A2E6B' : '#D9E4F5',
            color: conv.status === 'escalated' ? '#fff' : '#A8B3C7',
            display: 'flex', alignItems: 'center', justifyContent: 'center',
            cursor: conv.status === 'escalated' ? 'pointer' : 'not-allowed',
            flexShrink: 0,
          }}>
            <Icon name="send" size={16}/>
          </button>
        </div>
      </div>

      {/* ── Customer info panel ── */}
      <div style={{
        width: 260, flexShrink: 0, background: '#fff',
        borderLeft: '1px solid #E2EAF4',
        display: 'flex', flexDirection: 'column', overflowY: 'auto',
      }}>
        <div style={{ padding: 20, borderBottom: '1px solid #F4F7FC', textAlign: 'center' }}>
          <Initials name={conv.name} bg={conv.avatar} size={56}/>
          <div style={{ font: '800 15px/1.2 Nunito', color: '#0A2E6B', marginTop: 10 }}>{conv.name}</div>
          <div style={{ font: '500 12px/1 Nunito', color: '#7A89A8', marginTop: 4 }}>via {conv.channel}</div>
        </div>

        <div style={{ padding: 16, display: 'flex', flexDirection: 'column', gap: 16 }}>
          {[
            { label: 'Status',       value: STATUS_STYLES[conv.status].label, color: STATUS_STYLES[conv.status].color },
            { label: 'Session start', value: 'Today, 2:01 PM' },
            { label: 'Messages',      value: `${messages.length} messages` },
            { label: 'Channel',       value: conv.channel },
          ].map(f => (
            <div key={f.label}>
              <div style={{ font: '700 10px/1 Nunito', letterSpacing: '0.1em', textTransform: 'uppercase', color: '#A8B3C7', marginBottom: 4 }}>{f.label}</div>
              <div style={{ font: '600 13px/1 Nunito', color: f.color || '#0A2E6B' }}>{f.value}</div>
            </div>
          ))}

          <div>
            <div style={{ font: '700 10px/1 Nunito', letterSpacing: '0.1em', textTransform: 'uppercase', color: '#A8B3C7', marginBottom: 8 }}>Intent detected</div>
            <div style={{ display: 'flex', flexWrap: 'wrap', gap: 6 }}>
              {['Product inquiry', 'Reservation'].map(tag => (
                <span key={tag} style={{ background: '#E8F0FB', color: '#0A2E6B', borderRadius: 6, font: '600 11px/1 Nunito', padding: '4px 8px' }}>{tag}</span>
              ))}
            </div>
          </div>

          <button style={{
            width: '100%', height: 34, borderRadius: 8,
            border: '1px solid #E2EAF4', background: '#fff',
            font: '700 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
            display: 'flex', alignItems: 'center', justifyContent: 'center', gap: 6,
          }}>
            <Icon name="clock" size={13}/> View history
          </button>
        </div>
      </div>
    </div>
  )
}
