// Sidebar.jsx — Refined SaaS sidebar
function Sidebar({ current, onNav, collapsed, onToggle }) {
  const sections = [
    {
      label: 'Workspace',
      items: [
        { id: 'dashboard', label: 'Dashboard', icon: 'chart' },
        { id: 'chat',      label: 'Chat',      icon: 'message', badge: 3 },
        { id: 'products',  label: 'Products',  icon: 'inbox' },
        { id: 'inquiries', label: 'Inquiries', icon: 'bolt' },
      ],
    },
    {
      label: 'Account',
      items: [
        { id: 'integrations', label: 'Facebook Connect', icon: 'users' },
        { id: 'security',     label: 'Change Password',  icon: 'shield' },
        { id: 'settings',     label: 'Settings',         icon: 'settings' },
      ],
    },
  ];

  return (
    <aside style={{
      width: collapsed ? 72 : 248, flexShrink: 0,
      background: '#fff',
      borderRight: '1px solid #E2EAF4',
      display: 'flex', flexDirection: 'column',
      transition: 'width 240ms cubic-bezier(0.22, 1, 0.36, 1)',
      position: 'relative', zIndex: 4,
    }}>
      {/* Logo */}
      <div style={{
        display: 'flex', alignItems: 'center', gap: 10,
        padding: collapsed ? '20px 16px' : '20px 20px',
        height: 64, boxSizing: 'border-box',
        borderBottom: '1px solid #F4F7FC',
      }}>
        <div style={{
          width: 36, height: 36, borderRadius: 10,
          background: '#0A2E6B', display: 'flex', alignItems: 'center', justifyContent: 'center',
          flexShrink: 0,
        }}>
          <img src="assets/mindy-avatar.png" width={28} height={28} style={{ borderRadius: 999 }}/>
        </div>
        {!collapsed && (
          <div style={{ display: 'flex', flexDirection: 'column' }}>
            <div style={{ font: '800 19px/1 Nunito', color: '#0A2E6B', letterSpacing: '0.02em' }}>
              M<span style={{ color: '#00B5AE' }}>i</span>ndy
            </div>
            <div style={{ font: '700 9px/1 Nunito', letterSpacing: '0.18em', color: '#7A89A8', marginTop: 4 }}>
              CHAT AGENT
            </div>
          </div>
        )}
      </div>

      {/* Nav */}
      <div style={{ flex: 1, overflowY: 'auto', padding: '16px 12px', display: 'flex', flexDirection: 'column', gap: 18 }}>
        {sections.map((sec, sIdx) => (
          <div key={sIdx} style={{ display: 'flex', flexDirection: 'column', gap: 2 }}>
            {!collapsed && (
              <div style={{
                font: '700 10px/1 Nunito', letterSpacing: '0.12em',
                textTransform: 'uppercase', color: '#A8B3C7',
                padding: '4px 12px 8px',
              }}>
                {sec.label}
              </div>
            )}
            {sec.items.map(it => {
              const active = it.id === current;
              return (
                <button key={it.id} onClick={() => onNav(it.id)} title={collapsed ? it.label : ''}
                  style={{
                    display: 'flex', alignItems: 'center',
                    gap: collapsed ? 0 : 12,
                    justifyContent: collapsed ? 'center' : 'flex-start',
                    width: '100%',
                    padding: collapsed ? '10px' : '10px 12px',
                    border: 0, borderRadius: 10,
                    background: active ? '#E0F7F5' : 'transparent',
                    color: active ? '#00756F' : '#4B5C82',
                    font: `${active ? 700 : 600} 14px/1 Nunito`,
                    cursor: 'pointer', textAlign: 'left',
                    position: 'relative',
                    transition: 'background 150ms, color 150ms',
                  }}
                  onMouseEnter={e => { if (!active) e.currentTarget.style.background = '#F4F7FC'; }}
                  onMouseLeave={e => { if (!active) e.currentTarget.style.background = 'transparent'; }}
                >
                  {active && (
                    <span style={{
                      position: 'absolute', left: -12, top: 8, bottom: 8, width: 3,
                      borderRadius: '0 3px 3px 0', background: '#00B5AE',
                    }}/>
                  )}
                  <Icon name={it.icon} size={18} stroke={active ? 2.3 : 2} />
                  {!collapsed && <span style={{ flex: 1 }}>{it.label}</span>}
                  {!collapsed && it.badge && (
                    <span style={{
                      background: '#F27262', color: '#fff', borderRadius: 999,
                      minWidth: 20, height: 20, font: '700 11px/20px Nunito',
                      textAlign: 'center', padding: '0 6px',
                    }}>{it.badge}</span>
                  )}
                </button>
              );
            })}
          </div>
        ))}
      </div>

      {/* Credits / upgrade card */}
      {!collapsed && (
        <div style={{
          margin: '0 12px 12px', padding: 16, borderRadius: 14,
          background: 'linear-gradient(155deg, #0A2E6B 0%, #143A82 100%)',
          color: '#fff', position: 'relative', overflow: 'hidden',
        }}>
          <div style={{
            position: 'absolute', top: -10, right: -10, width: 80, height: 80,
            borderRadius: 999, background: 'rgba(0,181,174,0.18)',
          }}/>
          <div style={{ font: '700 11px/1 Nunito', letterSpacing: '0.1em', textTransform: 'uppercase', color: '#5BD9D3' }}>
            Credits
          </div>
          <div style={{ display: 'flex', alignItems: 'baseline', gap: 6, marginTop: 6 }}>
            <span style={{ font: '800 26px/1 Nunito' }}>10</span>
            <span style={{ font: '600 12px/1 Nunito', color: '#9FB5E3' }}>/ 200</span>
          </div>
          <div style={{ font: '400 11px/1.4 Nunito', color: '#9FB5E3', marginTop: 4 }}>
            Resets June 1
          </div>
          <div style={{
            height: 4, background: 'rgba(255,255,255,0.12)', borderRadius: 999,
            marginTop: 10, overflow: 'hidden',
          }}>
            <div style={{ width: '5%', height: '100%', background: '#F27262', borderRadius: 999 }}/>
          </div>
          <button style={{
            width: '100%', marginTop: 12, height: 32, borderRadius: 999,
            background: '#00B5AE', color: '#fff', border: 0,
            font: '700 12px/1 Nunito', cursor: 'pointer',
            position: 'relative', zIndex: 1,
          }}>Top up credits</button>
        </div>
      )}

      {/* Collapse toggle */}
      <button onClick={onToggle} style={{
        position: 'absolute', top: 28, right: -12, width: 24, height: 24,
        borderRadius: 999, background: '#fff', border: '1px solid #E2EAF4',
        display: 'flex', alignItems: 'center', justifyContent: 'center',
        cursor: 'pointer', color: '#4B5C82', boxShadow: '0 1px 2px rgba(10,46,107,0.06)',
        zIndex: 5,
      }}>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"
          style={{ transform: collapsed ? 'rotate(180deg)' : 'none', transition: 'transform 240ms' }}>
          <path d="M15 18l-6-6 6-6"/>
        </svg>
      </button>
    </aside>
  );
}

Object.assign(window, { Sidebar });
