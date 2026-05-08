import { useState, useMemo } from 'react'
import { Icon, Chip } from './Primitives'

function MetricCard({ label, value, unit, delta, trend, icon, sparkColor = '#00B5AE', sparkPoints, sparkArea }) {
  const up = trend === 'up'
  const dColor = trend === 'flat' ? '#7A89A8' : (up ? '#00756F' : '#C94E3F')
  const dBg    = trend === 'flat' ? '#F4F7FC' : (up ? '#E0F7F5' : '#FFEEEB')
  return (
    <div style={{
      background: '#fff', borderRadius: 16, padding: 20,
      border: '1px solid #EEF3FB',
      boxShadow: '0 1px 2px rgba(10,46,107,0.04)',
      display: 'flex', flexDirection: 'column', gap: 12, minWidth: 0, position: 'relative',
    }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 10 }}>
        <div style={{
          width: 36, height: 36, borderRadius: 10,
          background: `${sparkColor}1A`, color: sparkColor,
          display: 'flex', alignItems: 'center', justifyContent: 'center',
        }}>
          <Icon name={icon} size={18} stroke={2.2}/>
        </div>
        <div style={{ font: '700 12px/1 Nunito', color: '#4B5C82', flex: 1 }}>{label}</div>
        <Icon name="more" size={16} style={{ color: '#A8B3C7' }}/>
      </div>
      <div style={{ display: 'flex', alignItems: 'baseline', gap: 6 }}>
        <div style={{ font: '800 30px/1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>{value}</div>
        {unit && <div style={{ font: '700 13px/1 Nunito', color: '#7A89A8' }}>{unit}</div>}
      </div>
      <div style={{ display: 'flex', alignItems: 'center', gap: 8 }}>
        {delta && (
          <div style={{
            display: 'inline-flex', alignItems: 'center', gap: 4,
            padding: '3px 8px', borderRadius: 999,
            font: '700 11px/1 Nunito', color: dColor, background: dBg,
          }}>
            {trend !== 'flat' && (
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none">
                {up
                  ? <path d="M5 2 L8.5 6 L1.5 6 Z" fill="currentColor"/>
                  : <path d="M5 8 L1.5 4 L8.5 4 Z" fill="currentColor"/>}
              </svg>
            )}
            {delta}
          </div>
        )}
        <div style={{ font: '500 11px/1 Nunito', color: '#A8B3C7' }}>vs. last week</div>
      </div>
      {sparkPoints && (
        <svg width="100%" height="36" viewBox="0 0 200 36" preserveAspectRatio="none" style={{ marginTop: 'auto' }}>
          <defs>
            <linearGradient id={`g-${label}`} x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stopColor={sparkColor} stopOpacity="0.22"/>
              <stop offset="100%" stopColor={sparkColor} stopOpacity="0"/>
            </linearGradient>
          </defs>
          <polyline fill={`url(#g-${label})`} stroke="none" points={sparkArea}/>
          <polyline fill="none" stroke={sparkColor} strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" points={sparkPoints}/>
        </svg>
      )}
    </div>
  )
}

function ToggleSwitch({ on }) {
  const [val, setVal] = useState(on)
  return (
    <button onClick={() => setVal(v => !v)} style={{
      width: 44, height: 24, borderRadius: 999, border: 0, cursor: 'pointer',
      background: val ? '#00B5AE' : '#D9E4F5',
      position: 'relative', transition: 'background 150ms',
      padding: 0,
    }}>
      <span style={{
        position: 'absolute', top: 2, left: val ? 22 : 2,
        width: 20, height: 20, borderRadius: 999, background: '#fff',
        boxShadow: '0 1px 3px rgba(10,46,107,0.2)',
        transition: 'left 200ms cubic-bezier(0.22,1,0.36,1)',
      }}/>
    </button>
  )
}

function AccountDetails() {
  const fields = [
    { label: 'Plan',           value: 'Service',       sub: 'Pro tier' },
    { label: 'Contract start', value: 'Mar 3, 2026',   sub: '63 days ago' },
    { label: 'Contract end',   value: 'Mar 3, 2027',   sub: '302 days left' },
    { label: 'Credits',        value: '10',            sub: 'of 200 monthly', danger: true },
  ]
  return (
    <section style={{
      background: '#fff', borderRadius: 16, padding: 24,
      border: '1px solid #EEF3FB',
      boxShadow: '0 1px 2px rgba(10,46,107,0.04)',
    }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 12, marginBottom: 18 }}>
        <div style={{ font: '800 17px/1 Nunito', color: '#0A2E6B', flex: 1, letterSpacing: '-0.01em' }}>
          Account details
        </div>
        <Chip variant="success">Chatbot live</Chip>
        <button style={{
          height: 32, padding: '0 14px', borderRadius: 999,
          border: '1px solid #E2EAF4', background: '#fff',
          font: '700 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 6,
        }}>
          <Icon name="settings" size={14}/> Manage plan
        </button>
      </div>

      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(5, 1fr)', gap: 0 }}>
        {fields.map((f, i) => (
          <div key={f.label} style={{
            padding: '4px 20px', borderRight: i < 4 ? '1px solid #F4F7FC' : 'none',
            paddingLeft: i === 0 ? 0 : 20,
          }}>
            <div style={{ font: '700 10px/1 Nunito', letterSpacing: '0.1em', textTransform: 'uppercase', color: '#7A89A8' }}>
              {f.label}
            </div>
            <div style={{
              font: '800 22px/1.1 Nunito',
              color: f.danger ? '#C94E3F' : '#0A2E6B',
              marginTop: 8, letterSpacing: '-0.01em',
            }}>{f.value}</div>
            <div style={{ font: '500 12px/1 Nunito', color: '#7A89A8', marginTop: 6 }}>{f.sub}</div>
          </div>
        ))}
        {/* Chatbot toggle as 5th field */}
        <div style={{ padding: '4px 0 4px 20px' }}>
          <div style={{ font: '700 10px/1 Nunito', letterSpacing: '0.1em', textTransform: 'uppercase', color: '#7A89A8' }}>
            Chatbot status
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: 10, marginTop: 8 }}>
            <ToggleSwitch on={true}/>
            <div style={{ font: '700 14px/1 Nunito', color: '#00756F' }}>Online</div>
          </div>
          <div style={{ font: '500 12px/1 Nunito', color: '#7A89A8', marginTop: 8 }}>
            Last response 8s ago
          </div>
        </div>
      </div>
    </section>
  )
}

const SERIES = [
  { id: 'product',     label: 'Product inquiry', color: '#0A2E6B', total: 412 },
  { id: 'brand',       label: 'Brand inquiry',   color: '#00B5AE', total: 218 },
  { id: 'location',    label: 'Location',        color: '#6B8ED6', total: 184 },
  { id: 'promo',       label: 'Promo',           color: '#F5B44F', total: 96  },
  { id: 'sponsorship', label: 'Sponsorship',     color: '#F27262', total: 41  },
  { id: 'other',       label: 'Others',          color: '#A8B3C7', total: 28  },
]

const CHART_DATA = [
  { d: 'Apr 23', product: 28, brand: 14, location: 12, promo:  6, sponsorship: 3, other: 2 },
  { d: 'Apr 24', product: 32, brand: 16, location: 14, promo:  8, sponsorship: 2, other: 2 },
  { d: 'Apr 25', product: 24, brand: 18, location: 11, promo:  5, sponsorship: 4, other: 1 },
  { d: 'Apr 26', product: 20, brand: 12, location: 10, promo:  4, sponsorship: 2, other: 3 },
  { d: 'Apr 27', product: 36, brand: 22, location: 16, promo: 10, sponsorship: 5, other: 2 },
  { d: 'Apr 28', product: 41, brand: 28, location: 18, promo: 12, sponsorship: 4, other: 3 },
  { d: 'Apr 29', product: 38, brand: 21, location: 17, promo:  9, sponsorship: 5, other: 2 },
  { d: 'Apr 30', product: 33, brand: 19, location: 14, promo:  8, sponsorship: 3, other: 2 },
  { d: 'May 1',  product: 29, brand: 17, location: 13, promo:  7, sponsorship: 3, other: 2 },
  { d: 'May 2',  product: 26, brand: 15, location: 12, promo:  6, sponsorship: 2, other: 2 },
  { d: 'May 3',  product: 31, brand: 20, location: 15, promo:  8, sponsorship: 3, other: 2 },
  { d: 'May 4',  product: 35, brand: 22, location: 17, promo: 10, sponsorship: 4, other: 3 },
  { d: 'May 5',  product: 39, brand: 24, location: 18, promo: 11, sponsorship: 4, other: 2 },
  { d: 'May 6',  product: 42, brand: 26, location: 19, promo: 12, sponsorship: 5, other: 3 },
]

function Segmented({ options, value, onChange }) {
  return (
    <div style={{
      display: 'inline-flex', padding: 3, background: '#F4F7FC',
      borderRadius: 8, border: '1px solid #E2EAF4',
    }}>
      {options.map(o => (
        <button key={o} onClick={() => onChange(o)} style={{
          height: 28, padding: '0 12px', border: 0, borderRadius: 6,
          background: value === o ? '#fff' : 'transparent',
          color: value === o ? '#0A2E6B' : '#7A89A8',
          font: `${value === o ? 700 : 600} 12px/1 Nunito`,
          cursor: 'pointer',
          boxShadow: value === o ? '0 1px 2px rgba(10,46,107,0.06)' : 'none',
        }}>{o}</button>
      ))}
    </div>
  )
}

function InquiryChart() {
  const [active, setActive] = useState(SERIES.map(s => s.id))
  const [hoverIdx, setHoverIdx] = useState(null)
  const [granularity, setGran] = useState('Daily')
  const [range, setRange] = useState('14d')

  const w = 760, h = 280
  const padL = 40, padR = 12, padT = 18, padB = 28
  const innerW = w - padL - padR, innerH = h - padT - padB
  const max = useMemo(() => {
    let m = 0
    CHART_DATA.forEach(d => active.forEach(k => { if (d[k] > m) m = d[k] }))
    return Math.max(50, Math.ceil(m / 10) * 10)
  }, [active])
  const xStep = innerW / (CHART_DATA.length - 1)
  const yFor = v => padT + innerH - (v / max) * innerH
  const xFor = i => padL + i * xStep

  const toggle = id => setActive(a => a.includes(id) ? a.filter(x => x !== id) : [...a, id])

  const yTicks = [0, max * 0.25, max * 0.5, max * 0.75, max]

  return (
    <section style={{
      background: '#fff', borderRadius: 16,
      border: '1px solid #EEF3FB',
      boxShadow: '0 1px 2px rgba(10,46,107,0.04)',
      overflow: 'hidden',
    }}>
      {/* Header */}
      <div style={{
        padding: '20px 24px',
        display: 'flex', alignItems: 'flex-start', gap: 16,
        borderBottom: '1px solid #F4F7FC',
        flexWrap: 'wrap',
      }}>
        <div style={{ flex: 1, minWidth: 200 }}>
          <div style={{ font: '800 17px/1.2 Nunito', color: '#0A2E6B', letterSpacing: '-0.01em' }}>
            Inquiry types
          </div>
          <div style={{ font: '400 13px/1.4 Nunito', color: '#7A89A8', marginTop: 4 }}>
            Conversations by category — Apr 23 → May 6
          </div>
        </div>
        <Segmented options={['Daily', 'Weekly', 'Monthly']} value={granularity} onChange={setGran}/>
        <Segmented options={['7d', '14d', '30d', 'Custom']} value={range} onChange={setRange}/>
        <button style={{
          height: 34, padding: '0 12px', borderRadius: 8,
          border: '1px solid #E2EAF4', background: '#fff',
          font: '700 12px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 6,
        }}>
          <Icon name="paperclip" size={14} stroke={2.2}/> Export
        </button>
      </div>

      {/* Legend */}
      <div style={{ padding: '14px 24px 0', display: 'flex', flexWrap: 'wrap', gap: 8 }}>
        {SERIES.map(s => {
          const on = active.includes(s.id)
          return (
            <button key={s.id} onClick={() => toggle(s.id)} style={{
              display: 'inline-flex', alignItems: 'center', gap: 8,
              padding: '6px 12px', borderRadius: 999,
              border: `1px solid ${on ? s.color + '55' : '#E2EAF4'}`,
              background: on ? s.color + '12' : '#F4F7FC',
              color: on ? '#0A2E6B' : '#A8B3C7',
              font: '700 12px/1 Nunito', cursor: 'pointer',
              transition: 'all 150ms',
            }}>
              <span style={{ width: 8, height: 8, borderRadius: 999, background: on ? s.color : '#D9E4F5' }}/>
              {s.label}
              <span style={{ font: '500 11px/1 JetBrains Mono', color: on ? '#7A89A8' : '#C7CFDC' }}>{s.total}</span>
            </button>
          )
        })}
      </div>

      {/* Chart */}
      <div style={{ padding: '8px 24px 20px', position: 'relative' }}>
        <svg width="100%" viewBox={`0 0 ${w} ${h}`} preserveAspectRatio="none"
          style={{ display: 'block', height: 280 }}
          onMouseMove={e => {
            const rect = e.currentTarget.getBoundingClientRect()
            const px = (e.clientX - rect.left) / rect.width * w
            const idx = Math.round((px - padL) / xStep)
            setHoverIdx(idx >= 0 && idx < CHART_DATA.length ? idx : null)
          }}
          onMouseLeave={() => setHoverIdx(null)}
        >
          {/* Y grid */}
          {yTicks.map((v, i) => (
            <g key={i}>
              <line x1={padL} x2={w - padR} y1={yFor(v)} y2={yFor(v)}
                stroke="#F4F7FC" strokeWidth="1"
                strokeDasharray={i === 0 ? '0' : '3 3'}/>
              <text x={padL - 8} y={yFor(v) + 4} textAnchor="end"
                style={{ font: '500 10px JetBrains Mono', fill: '#A8B3C7' }}>
                {Math.round(v)}
              </text>
            </g>
          ))}

          {/* Lines */}
          {SERIES.filter(s => active.includes(s.id)).map(s => {
            const points = CHART_DATA.map((d, i) => `${xFor(i)},${yFor(d[s.id])}`).join(' ')
            const area = `${xFor(0)},${yFor(0)} ${points} ${xFor(CHART_DATA.length - 1)},${yFor(0)}`
            return (
              <g key={s.id}>
                <defs>
                  <linearGradient id={`fill-${s.id}`} x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stopColor={s.color} stopOpacity={s.id === 'product' ? 0.18 : 0.06}/>
                    <stop offset="100%" stopColor={s.color} stopOpacity="0"/>
                  </linearGradient>
                </defs>
                {s.id === 'product' && (
                  <polygon fill={`url(#fill-${s.id})`} points={area}/>
                )}
                <polyline fill="none" stroke={s.color} strokeWidth="2.2"
                  strokeLinecap="round" strokeLinejoin="round" points={points}/>
              </g>
            )
          })}

          {/* X labels */}
          {CHART_DATA.map((d, i) => (
            (i % 2 === 0 || i === CHART_DATA.length - 1) && (
              <text key={i} x={xFor(i)} y={h - 8} textAnchor="middle"
                style={{ font: '500 10px JetBrains Mono', fill: '#A8B3C7' }}>
                {d.d}
              </text>
            )
          ))}

          {/* Hover crosshair */}
          {hoverIdx !== null && (
            <g>
              <line x1={xFor(hoverIdx)} x2={xFor(hoverIdx)} y1={padT} y2={h - padB}
                stroke="#0A2E6B" strokeWidth="1" strokeDasharray="3 3" opacity="0.3"/>
              {SERIES.filter(s => active.includes(s.id)).map(s => (
                <circle key={s.id} cx={xFor(hoverIdx)} cy={yFor(CHART_DATA[hoverIdx][s.id])}
                  r="4" fill="#fff" stroke={s.color} strokeWidth="2"/>
              ))}
            </g>
          )}
        </svg>

        {/* Hover tooltip */}
        {hoverIdx !== null && (
          <div style={{
            position: 'absolute',
            left: `min(calc(${(xFor(hoverIdx) / w) * 100}% + 12px), calc(100% - 200px))`,
            top: 16,
            background: '#fff', border: '1px solid #E2EAF4',
            borderRadius: 12, padding: 12, minWidth: 180,
            boxShadow: '0 12px 32px rgba(10,46,107,0.12)',
            pointerEvents: 'none',
          }}>
            <div style={{ font: '700 11px/1 JetBrains Mono', color: '#7A89A8', marginBottom: 8 }}>
              {CHART_DATA[hoverIdx].d}
            </div>
            {SERIES.filter(s => active.includes(s.id)).map(s => (
              <div key={s.id} style={{
                display: 'flex', alignItems: 'center', gap: 8,
                font: '600 12px/1.6 Nunito', color: '#0A2E6B',
              }}>
                <span style={{ width: 8, height: 8, borderRadius: 2, background: s.color, flexShrink: 0 }}/>
                <span style={{ flex: 1, color: '#4B5C82' }}>{s.label}</span>
                <span style={{ font: '700 12px/1 Nunito', color: '#0A2E6B' }}>{CHART_DATA[hoverIdx][s.id]}</span>
              </div>
            ))}
          </div>
        )}
      </div>
    </section>
  )
}

function TopInquiriesCard() {
  const items = [
    { q: 'Where is the nearest store?',         cat: 'Location',        count: 84, color: '#6B8ED6' },
    { q: 'Do you have this in size M?',         cat: 'Product inquiry', count: 71, color: '#0A2E6B' },
    { q: 'Is the May promo still on?',          cat: 'Promo',           count: 52, color: '#F5B44F' },
    { q: 'What time do you open on Sundays?',   cat: 'Location',        count: 38, color: '#6B8ED6' },
    { q: 'Do you sponsor school events?',       cat: 'Sponsorship',     count: 19, color: '#F27262' },
  ]
  const max = items[0].count
  return (
    <section style={{
      background: '#fff', borderRadius: 16, padding: 20,
      border: '1px solid #EEF3FB',
      boxShadow: '0 1px 2px rgba(10,46,107,0.04)',
    }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 8, marginBottom: 16 }}>
        <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B', flex: 1, letterSpacing: '-0.01em' }}>
          Top inquiries this week
        </div>
        <button style={{
          font: '700 12px/1 Nunito', color: '#00756F',
          background: 'transparent', border: 0, cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 4,
        }}>View all <Icon name="arrowRight" size={12} stroke={2.4}/></button>
      </div>
      <div style={{ display: 'flex', flexDirection: 'column', gap: 14 }}>
        {items.map((it, i) => (
          <div key={i}>
            <div style={{ display: 'flex', alignItems: 'center', gap: 10, marginBottom: 6 }}>
              <div style={{
                width: 22, height: 22, borderRadius: 6,
                background: '#F4F7FC', color: '#7A89A8',
                font: '700 11px/22px JetBrains Mono', textAlign: 'center', flexShrink: 0,
              }}>{i + 1}</div>
              <div style={{ flex: 1, font: '600 13px/1.3 Nunito', color: '#0A2E6B' }}>{it.q}</div>
              <div style={{ font: '700 13px/1 Nunito', color: '#0A2E6B' }}>{it.count}</div>
            </div>
            <div style={{ display: 'flex', alignItems: 'center', gap: 8, paddingLeft: 32 }}>
              <div style={{ flex: 1, height: 4, background: '#F4F7FC', borderRadius: 999 }}>
                <div style={{
                  width: `${(it.count / max) * 100}%`, height: '100%',
                  background: it.color, borderRadius: 999,
                }}/>
              </div>
              <div style={{ font: '600 10px/1 Nunito', color: it.color }}>{it.cat}</div>
            </div>
          </div>
        ))}
      </div>
    </section>
  )
}

function ActivityCard() {
  const events = [
    { type: 'ok',   title: 'Booked: Table for 4 at Ito Sushi',  time: '2:04p',  meta: 'Priya Shah · opentable' },
    { type: 'info', title: 'Sent confirmation to Marcus Hill',   time: '1:47p',  meta: 'sonder · postmark' },
    { type: 'warn', title: 'Refund $640 needs operator review',  time: '1:13p',  meta: 'Jules Carter · shopify' },
    { type: 'err',  title: 'Shopify lookup failed — retrying',   time: '12:58p', meta: 'Eliza Nguyen · shopify' },
    { type: 'ok',   title: 'Booked AeroMexico flight 684',       time: '11:22a', meta: 'Diego Fuentes · amadeus' },
  ]
  const styles = {
    ok:   { bg: '#E0F7F5', fg: '#00756F', icon: 'check' },
    info: { bg: '#E8F0FB', fg: '#0A2E6B', icon: 'mail' },
    warn: { bg: '#FFF6E3', fg: '#C98A2E', icon: 'alert' },
    err:  { bg: '#FFEEEB', fg: '#C94E3F', icon: 'x' },
  }
  return (
    <section style={{
      background: '#fff', borderRadius: 16, padding: 20,
      border: '1px solid #EEF3FB',
      boxShadow: '0 1px 2px rgba(10,46,107,0.04)',
    }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 8, marginBottom: 16 }}>
        <div style={{ font: '800 15px/1 Nunito', color: '#0A2E6B', flex: 1, letterSpacing: '-0.01em' }}>
          Mindy's recent actions
        </div>
        <span style={{
          font: '600 11px/1 Nunito', color: '#00756F',
          background: '#E0F7F5', borderRadius: 999, padding: '4px 8px',
          display: 'inline-flex', alignItems: 'center', gap: 5,
        }}>
          <span style={{ width: 6, height: 6, borderRadius: 999, background: '#00B5AE' }}/>
          Live
        </span>
      </div>
      <div style={{ display: 'flex', flexDirection: 'column', gap: 14 }}>
        {events.map((e, i) => {
          const s = styles[e.type]
          return (
            <div key={i} style={{ display: 'flex', gap: 12 }}>
              <div style={{
                width: 32, height: 32, borderRadius: 8,
                background: s.bg, color: s.fg, flexShrink: 0,
                display: 'flex', alignItems: 'center', justifyContent: 'center',
              }}>
                <Icon name={s.icon} size={15} stroke={2.4}/>
              </div>
              <div style={{ flex: 1, minWidth: 0 }}>
                <div style={{ font: '700 13px/1.3 Nunito', color: '#0A2E6B' }}>{e.title}</div>
                <div style={{ font: '500 11px/1.3 JetBrains Mono', color: '#7A89A8', marginTop: 3 }}>
                  {e.meta}
                </div>
              </div>
              <div style={{ font: '600 11px/1 Nunito', color: '#A8B3C7', whiteSpace: 'nowrap' }}>{e.time}</div>
            </div>
          )
        })}
      </div>
    </section>
  )
}

function KPIStrip() {
  return (
    <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4, 1fr)', gap: 16 }}>
      <MetricCard
        label="Conversations today" value="248" delta="12.4%" trend="up" icon="message" sparkColor="#00B5AE"
        sparkPoints="0,28 25,22 50,26 75,18 100,20 125,12 150,16 175,8 200,10"
        sparkArea="0,36 0,28 25,22 50,26 75,18 100,20 125,12 150,16 175,8 200,10 200,36"
      />
      <MetricCard
        label="Resolved by Mindy" value="219" unit="/ 248" delta="88%" trend="up" icon="check" sparkColor="#0A2E6B"
        sparkPoints="0,24 25,20 50,22 75,14 100,16 125,10 150,12 175,8 200,6"
        sparkArea="0,36 0,24 25,20 50,22 75,14 100,16 125,10 150,12 175,8 200,6 200,36"
      />
      <MetricCard
        label="Escalations" value="4" delta="2 fewer" trend="up" icon="alert" sparkColor="#F5B44F"
        sparkPoints="0,12 25,16 50,14 75,20 100,18 125,22 150,24 175,28 200,26"
        sparkArea="0,36 0,12 25,16 50,14 75,20 100,18 125,22 150,24 175,28 200,26 200,36"
      />
      <MetricCard
        label="Avg response time" value="1.8" unit="seconds" delta="0.4s faster" trend="up" icon="clock" sparkColor="#F27262"
        sparkPoints="0,20 25,22 50,18 75,16 100,14 125,12 150,10 175,8 200,6"
        sparkArea="0,36 0,20 25,22 50,18 75,16 100,14 125,12 150,10 175,8 200,6 200,36"
      />
    </div>
  )
}

export default function DashboardView() {
  return (
    <div style={{
      flex: 1, overflow: 'auto', padding: 28,
      display: 'flex', flexDirection: 'column', gap: 20,
      background: '#F4F7FC',
    }}>
      {/* Greeting */}
      <div style={{ display: 'flex', alignItems: 'center', gap: 16, flexWrap: 'wrap' }}>
        <div style={{ flex: 1, minWidth: 240 }}>
          <div style={{ font: '800 26px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>
            Welcome back, Wendy
          </div>
          <div style={{ font: '400 14px/1.4 Nunito', color: '#4B5C82', marginTop: 4 }}>
            Mindy handled 219 of 248 inquiries today — here's what's going on.
          </div>
        </div>
        <div style={{ display: 'flex', gap: 8 }}>
          <button style={{
            height: 38, padding: '0 14px', borderRadius: 10,
            border: '1px solid #E2EAF4', background: '#fff',
            font: '700 13px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
            display: 'inline-flex', alignItems: 'center', gap: 8,
          }}>
            <Icon name="calendar" size={16}/> May 6, 2026
          </button>
          <button style={{
            height: 38, padding: '0 16px', borderRadius: 10,
            border: 0, background: '#0A2E6B',
            font: '700 13px/1 Nunito', color: '#fff', cursor: 'pointer',
            display: 'inline-flex', alignItems: 'center', gap: 8,
          }}>
            <Icon name="plus" size={15} stroke={2.4}/> New chatbot
          </button>
        </div>
      </div>

      <AccountDetails/>
      <KPIStrip/>

      <div style={{ display: 'grid', gridTemplateColumns: 'minmax(0, 1.55fr) minmax(0, 1fr)', gap: 20 }}>
        <InquiryChart/>
        <div style={{ display: 'flex', flexDirection: 'column', gap: 20 }}>
          <TopInquiriesCard/>
          <ActivityCard/>
        </div>
      </div>
    </div>
  )
}
