import { useState } from 'react'
import { Icon } from './Primitives'

const INQUIRIES = [
  { id: 1,  customer: 'Priya Shah',    message: 'Do you have the red floral dress in size S?',       category: 'Product inquiry', date: 'May 6, 2:01p',  status: 'resolved',  channel: 'Messenger' },
  { id: 2,  customer: 'Diego Fuentes', message: 'What time does the BGC branch close today?',         category: 'Location',        date: 'May 6, 2:00p',  status: 'active',    channel: 'Messenger' },
  { id: 3,  customer: 'Eliza Nguyen',  message: 'Is the buy-1-take-1 promo still available?',         category: 'Promo',           date: 'May 6, 1:57p',  status: 'active',    channel: 'Messenger' },
  { id: 4,  customer: 'Jules Carter',  message: 'I want a full refund for my order #4821',            category: 'Sponsorship',     date: 'May 6, 1:13p',  status: 'escalated', channel: 'Messenger' },
  { id: 5,  customer: 'Marcus Hill',   message: 'Can you resend my order confirmation for #3309?',    category: 'Product inquiry', date: 'May 6, 1:44p',  status: 'resolved',  channel: 'Messenger' },
  { id: 6,  customer: 'Ryan Santos',   message: 'What are your store locations in Quezon City?',      category: 'Location',        date: 'May 6, 11:20a', status: 'resolved',  channel: 'Messenger' },
  { id: 7,  customer: 'Ana Reyes',     message: 'Do you sponsor local school events?',                category: 'Sponsorship',     date: 'May 5, 3:44p',  status: 'resolved',  channel: 'Messenger' },
  { id: 8,  customer: 'Carlo Bautista',message: 'Is this jacket available in size XL?',               category: 'Product inquiry', date: 'May 5, 2:12p',  status: 'resolved',  channel: 'Messenger' },
  { id: 9,  customer: 'Sofia Lim',     message: 'What are the payment options available?',            category: 'Brand inquiry',   date: 'May 5, 11:05a', status: 'resolved',  channel: 'Messenger' },
  { id: 10, customer: 'James Tan',     message: 'Can I return an item bought online to the store?',   category: 'Brand inquiry',   date: 'May 4, 4:30p',  status: 'resolved',  channel: 'Messenger' },
  { id: 11, customer: 'Maria Cruz',    message: 'Do you have a loyalty points program?',              category: 'Brand inquiry',   date: 'May 4, 2:15p',  status: 'resolved',  channel: 'Messenger' },
  { id: 12, customer: 'Kevin Delos',   message: 'How long does shipping usually take?',               category: 'Product inquiry', date: 'May 3, 9:45a',  status: 'resolved',  channel: 'Messenger' },
]

const CAT_COLORS = {
  'Product inquiry': { bg: '#E8F0FB', color: '#0A2E6B' },
  'Brand inquiry':   { bg: '#E0F7F5', color: '#00756F' },
  'Location':        { bg: '#EEF2FF', color: '#4A6AB0' },
  'Promo':           { bg: '#FFF6E3', color: '#C98A2E' },
  'Sponsorship':     { bg: '#FFEEEB', color: '#C94E3F' },
}

const INQ_STATUS = {
  active:    { label: 'Active',    bg: '#E0F7F5', color: '#00756F' },
  escalated: { label: 'Escalated', bg: '#FFF6E3', color: '#C98A2E' },
  resolved:  { label: 'Resolved',  bg: '#F4F7FC', color: '#4B5C82' },
}

const STAT_CARDS = [
  { label: 'Total inquiries', value: '979', delta: '+18%', icon: 'message',  color: '#00B5AE' },
  { label: 'Resolved by Mindy', value: '912', delta: '93%',  icon: 'check',   color: '#0A2E6B' },
  { label: 'Escalated',       value: '28',  delta: '−4',    icon: 'alert',   color: '#F5B44F' },
  { label: 'Avg handle time', value: '1.8s', delta: 'faster', icon: 'clock',  color: '#F27262' },
]

export default function InquiriesView() {
  const [search, setSearch] = useState('')
  const [statusFilter, setStatusFilter] = useState('All')
  const [catFilter, setCatFilter] = useState('All')

  const statuses = ['All', 'Active', 'Resolved', 'Escalated']
  const categories = ['All', ...Object.keys(CAT_COLORS)]

  const filtered = INQUIRIES.filter(q => {
    const matchStatus = statusFilter === 'All' || q.status === statusFilter.toLowerCase()
    const matchCat = catFilter === 'All' || q.category === catFilter
    const matchSearch = q.customer.toLowerCase().includes(search.toLowerCase()) || q.message.toLowerCase().includes(search.toLowerCase())
    return matchStatus && matchCat && matchSearch
  })

  return (
    <div style={{ flex: 1, overflow: 'auto', background: '#F4F7FC', minHeight: 0 }}>
    <div style={{ padding: 28, display: 'flex', flexDirection: 'column', gap: 20 }}>
      {/* Header */}
      <div style={{ display: 'flex', alignItems: 'center', gap: 12 }}>
        <div style={{ flex: 1 }}>
          <div style={{ font: '800 22px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>Inquiries</div>
          <div style={{ font: '400 13px/1.4 Nunito', color: '#4B5C82', marginTop: 3 }}>All conversations and detected intents</div>
        </div>
        <button style={{
          height: 38, padding: '0 14px', borderRadius: 10, border: '1px solid #E2EAF4',
          background: '#fff', font: '700 13px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 8,
        }}>
          <Icon name="paperclip" size={15}/> Export
        </button>
      </div>

      {/* Stat cards */}
      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4,1fr)', gap: 16 }}>
        {STAT_CARDS.map(s => (
          <div key={s.label} style={{ background: '#fff', borderRadius: 14, padding: '16px 20px', border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', display: 'flex', alignItems: 'center', gap: 14 }}>
            <div style={{ width: 40, height: 40, borderRadius: 10, background: s.color + '1A', color: s.color, display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
              <Icon name={s.icon} size={18} stroke={2.2}/>
            </div>
            <div>
              <div style={{ font: '800 22px/1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>{s.value}</div>
              <div style={{ font: '600 11px/1 Nunito', color: '#7A89A8', marginTop: 4 }}>{s.label}</div>
            </div>
            <div style={{ marginLeft: 'auto', font: '700 11px/1 Nunito', color: s.color, background: s.color + '1A', borderRadius: 6, padding: '3px 8px' }}>{s.delta}</div>
          </div>
        ))}
      </div>

      {/* Filters */}
      <div style={{ display: 'flex', gap: 12, flexWrap: 'wrap', alignItems: 'center' }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: 8, flex: 1, minWidth: 200, maxWidth: 340, height: 38, padding: '0 12px', background: '#fff', borderRadius: 10, border: '1px solid #E2EAF4' }}>
          <Icon name="search" size={16} style={{ color: '#A8B3C7' }}/>
          <input value={search} onChange={e => setSearch(e.target.value)} placeholder="Search customer or message…" style={{ flex: 1, border: 0, background: 'transparent', outline: 'none', font: '400 13px/1 Nunito', color: '#0A2E6B' }}/>
        </div>
        <div style={{ display: 'inline-flex', padding: 3, background: '#fff', borderRadius: 8, border: '1px solid #E2EAF4' }}>
          {statuses.map(s => (
            <button key={s} onClick={() => setStatusFilter(s)} style={{ height: 28, padding: '0 12px', border: 0, borderRadius: 6, background: statusFilter === s ? '#0A2E6B' : 'transparent', color: statusFilter === s ? '#fff' : '#7A89A8', font: `${statusFilter === s ? 700 : 600} 12px/1 Nunito`, cursor: 'pointer' }}>{s}</button>
          ))}
        </div>
        <select value={catFilter} onChange={e => setCatFilter(e.target.value)} style={{ height: 38, padding: '0 12px', borderRadius: 10, border: '1px solid #E2EAF4', background: '#fff', font: '600 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer', outline: 'none' }}>
          {categories.map(c => <option key={c} value={c}>{c === 'All' ? 'All categories' : c}</option>)}
        </select>
      </div>

      {/* Table */}
      <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', overflow: 'hidden' }}>
        <div style={{ display: 'grid', gridTemplateColumns: '1.4fr 2fr 130px 120px 110px 80px', padding: '0 20px', borderBottom: '1px solid #F4F7FC', background: '#FAFBFE' }}>
          {['Customer', 'Message', 'Category', 'Date', 'Status', ''].map((h, i) => (
            <div key={i} style={{ padding: '12px 0', font: '700 11px/1 Nunito', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#A8B3C7' }}>{h}</div>
          ))}
        </div>

        {filtered.map((q, idx) => {
          const st = INQ_STATUS[q.status]
          const ct = CAT_COLORS[q.category] || { bg: '#F4F7FC', color: '#4B5C82' }
          return (
            <div key={q.id} style={{ display: 'grid', gridTemplateColumns: '1.4fr 2fr 130px 120px 110px 80px', padding: '0 20px', borderBottom: idx < filtered.length - 1 ? '1px solid #F4F7FC' : 'none', transition: 'background 150ms', cursor: 'default' }}
              onMouseEnter={e => e.currentTarget.style.background = '#FAFBFE'}
              onMouseLeave={e => e.currentTarget.style.background = 'transparent'}
            >
              <div style={{ display: 'flex', alignItems: 'center', gap: 10, padding: '14px 0' }}>
                <div style={{ width: 30, height: 30, borderRadius: 999, background: ct.bg, color: ct.color, display: 'flex', alignItems: 'center', justifyContent: 'center', font: '700 11px/1 Nunito', flexShrink: 0 }}>
                  {q.customer.split(' ').map(s => s[0]).join('').slice(0, 2)}
                </div>
                <div style={{ font: '700 13px/1 Nunito', color: '#0A2E6B' }}>{q.customer}</div>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', font: '500 12px/1.4 Nunito', color: '#4B5C82', overflow: 'hidden' }}>
                <span style={{ overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>{q.message}</span>
              </div>
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <span style={{ background: ct.bg, color: ct.color, borderRadius: 6, font: '600 11px/1 Nunito', padding: '4px 8px' }}>{q.category}</span>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', font: '500 11px/1 Nunito', color: '#7A89A8' }}>{q.date}</div>
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <span style={{ background: st.bg, color: st.color, borderRadius: 6, font: '600 11px/1 Nunito', padding: '4px 8px' }}>{st.label}</span>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                <button style={{ width: 28, height: 28, borderRadius: 6, border: '1px solid #E2EAF4', background: '#fff', display: 'flex', alignItems: 'center', justifyContent: 'center', color: '#A8B3C7', cursor: 'pointer' }}>
                  <Icon name="arrowRight" size={13} stroke={2.2}/>
                </button>
              </div>
            </div>
          )
        })}

        {filtered.length === 0 && (
          <div style={{ padding: '40px', textAlign: 'center', color: '#A8B3C7', font: '500 13px/1 Nunito' }}>No inquiries match your filters.</div>
        )}
      </div>
    </div>
    </div>
  )
}
