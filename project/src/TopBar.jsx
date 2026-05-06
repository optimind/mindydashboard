// TopBar.jsx
function TopBar({ title, subtitle, user }) {
  const [open, setOpen] = React.useState(false);
  return (
    <header style={{
      height: 64, flexShrink: 0,
      background: 'rgba(255,255,255,0.92)',
      backdropFilter: 'blur(8px)',
      borderBottom: '1px solid #E2EAF4',
      display: 'flex', alignItems: 'center', gap: 16, padding: '0 28px',
      position: 'sticky', top: 0, zIndex: 5,
    }}>
      <div style={{ flex: 1, minWidth: 0 }}>
        <div style={{ font: '800 18px/1.2 Nunito', color: '#0A2E6B', letterSpacing: '-0.01em' }}>{title}</div>
        {subtitle && <div style={{ font: '400 12px/1.2 Nunito', color: '#7A89A8', marginTop: 3 }}>{subtitle}</div>}
      </div>

      {/* Search */}
      <div style={{
        display: 'flex', alignItems: 'center', gap: 8, width: 320,
        height: 38, padding: '0 12px', background: '#F4F7FC', borderRadius: 10,
        border: '1px solid transparent',
        transition: 'border-color 150ms, background 150ms',
      }}>
        <Icon name="search" size={16} style={{ color: '#7A89A8' }}/>
        <input placeholder="Search inquiries, products, customers…" style={{
          flex: 1, border: 0, background: 'transparent', outline: 'none',
          font: '400 13px/1 Nunito', color: '#0A2E6B',
        }}/>
        <span style={{
          font: '500 10px/1 JetBrains Mono', color: '#7A89A8',
          border: '1px solid #D9E4F5', borderRadius: 4, padding: '3px 6px', background: '#fff',
        }}>⌘K</span>
      </div>

      {/* Credits chip */}
      <div style={{
        display: 'flex', alignItems: 'center', gap: 8,
        height: 38, padding: '0 12px', borderRadius: 10,
        background: '#FFEEEB', color: '#C94E3F',
        font: '700 12px/1 Nunito',
      }}>
        <Icon name="bolt" size={14} stroke={2.3}/>
        <span>10 credits</span>
        <span style={{ color: '#F27262', font: '600 11px/1 Nunito' }}>· resets Jun 1</span>
      </div>

      {/* Bell */}
      <button style={{
        width: 38, height: 38, borderRadius: 10, border: '1px solid #E2EAF4',
        background: '#fff', display: 'flex', alignItems: 'center', justifyContent: 'center',
        color: '#4B5C82', cursor: 'pointer', position: 'relative',
      }}>
        <Icon name="bell" size={18}/>
        <span style={{
          position: 'absolute', top: 7, right: 7, width: 8, height: 8,
          borderRadius: 999, background: '#F27262', border: '2px solid #fff',
        }}/>
      </button>

      {/* User menu */}
      <button onClick={() => setOpen(o => !o)} style={{
        display: 'flex', alignItems: 'center', gap: 10,
        height: 38, padding: '0 6px 0 6px', borderRadius: 999,
        border: '1px solid #E2EAF4', background: '#fff', cursor: 'pointer',
      }}>
        <Avatar name={user.name} size={28}/>
        <span style={{ font: '700 13px/1 Nunito', color: '#0A2E6B' }}>{user.name}</span>
        <Icon name="more" size={14} style={{ color: '#7A89A8', transform: 'rotate(90deg)', marginRight: 4 }}/>
      </button>
    </header>
  );
}

Object.assign(window, { TopBar });
