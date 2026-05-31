import { useState } from 'react'
import { Icon, Chip } from './Primitives'

const CATEGORIES = ['All', 'Tops', 'Bottoms', 'Dresses', 'Accessories']

const PRODUCTS = [
  { id: 1, name: 'Red Floral Wrap Dress',     sku: 'RF-2204', category: 'Dresses',     price: 1299, stock: 'in_stock',   qty: 14, mindy: true  },
  { id: 2, name: 'Classic White Polo Shirt',  sku: 'WP-1102', category: 'Tops',        price: 899,  stock: 'in_stock',   qty: 32, mindy: true  },
  { id: 3, name: 'Blue Denim Jeans (Slim)',   sku: 'DJ-3301', category: 'Bottoms',     price: 1599, stock: 'low_stock',  qty: 3,  mindy: true  },
  { id: 4, name: 'Summer Floral Blouse',      sku: 'FB-2208', category: 'Tops',        price: 1099, stock: 'in_stock',   qty: 21, mindy: true  },
  { id: 5, name: 'Black Leather Tote Bag',    sku: 'BT-5501', category: 'Accessories', price: 2499, stock: 'in_stock',   qty: 8,  mindy: true  },
  { id: 6, name: 'Gold Hoop Earrings Set',    sku: 'GE-6603', category: 'Accessories', price: 599,  stock: 'out_stock',  qty: 0,  mindy: false },
  { id: 7, name: 'Silk Scarf (Floral Print)', sku: 'SS-6610', category: 'Accessories', price: 799,  stock: 'in_stock',   qty: 17, mindy: true  },
  { id: 8, name: 'High-Waist Linen Trousers', sku: 'LT-3308', category: 'Bottoms',     price: 1399, stock: 'low_stock',  qty: 2,  mindy: false },
  { id: 9, name: 'Striped Cotton Tee',        sku: 'ST-1115', category: 'Tops',        price: 699,  stock: 'in_stock',   qty: 45, mindy: true  },
]

const STOCK_STYLE = {
  in_stock:  { label: 'In stock',    bg: '#E0F7F5', color: '#00756F' },
  low_stock: { label: 'Low stock',   bg: '#FFF6E3', color: '#C98A2E' },
  out_stock: { label: 'Out of stock', bg: '#FFEEEB', color: '#C94E3F' },
}

function MindyToggle({ on, onChange }) {
  return (
    <button onClick={() => onChange(!on)} style={{
      width: 36, height: 20, borderRadius: 999, border: 0, cursor: 'pointer',
      background: on ? '#00B5AE' : '#D9E4F5', position: 'relative',
      transition: 'background 150ms', padding: 0, flexShrink: 0,
    }}>
      <span style={{
        position: 'absolute', top: 2, left: on ? 18 : 2,
        width: 16, height: 16, borderRadius: 999, background: '#fff',
        boxShadow: '0 1px 3px rgba(10,46,107,0.2)',
        transition: 'left 180ms cubic-bezier(0.22,1,0.36,1)',
      }}/>
    </button>
  )
}

export default function ProductsView() {
  const [search, setSearch] = useState('')
  const [category, setCategory] = useState('All')
  const [products, setProducts] = useState(PRODUCTS)
  const [selected, setSelected] = useState(new Set())

  const filtered = products.filter(p => {
    const matchCat = category === 'All' || p.category === category
    const matchSearch = p.name.toLowerCase().includes(search.toLowerCase()) || p.sku.toLowerCase().includes(search.toLowerCase())
    return matchCat && matchSearch
  })

  const toggleMindy = (id) => setProducts(ps => ps.map(p => p.id === id ? { ...p, mindy: !p.mindy } : p))

  const toggleSelect = (id) => setSelected(s => {
    const n = new Set(s)
    n.has(id) ? n.delete(id) : n.add(id)
    return n
  })

  return (
    <div style={{ flex: 1, overflow: 'auto', padding: 28, background: '#F4F7FC', display: 'flex', flexDirection: 'column', gap: 20 }}>
      {/* Header row */}
      <div style={{ display: 'flex', alignItems: 'center', gap: 12, flexWrap: 'wrap' }}>
        <div style={{ flex: 1 }}>
          <div style={{ font: '800 22px/1.1 Nunito', color: '#0A2E6B', letterSpacing: '-0.02em' }}>Products</div>
          <div style={{ font: '400 13px/1.4 Nunito', color: '#4B5C82', marginTop: 3 }}>{products.length} items in catalogue · {products.filter(p => p.mindy).length} enabled for Mindy</div>
        </div>
        <button style={{
          height: 38, padding: '0 16px', borderRadius: 10, border: '1px solid #E2EAF4',
          background: '#fff', font: '700 13px/1 Nunito', color: '#0A2E6B', cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 8,
        }}>
          <Icon name="paperclip" size={15}/> Import CSV
        </button>
        <button style={{
          height: 38, padding: '0 16px', borderRadius: 10, border: 0,
          background: '#0A2E6B', font: '700 13px/1 Nunito', color: '#fff', cursor: 'pointer',
          display: 'inline-flex', alignItems: 'center', gap: 8,
        }}>
          <Icon name="plus" size={15} stroke={2.4}/> Add product
        </button>
      </div>

      {/* Filters */}
      <div style={{ display: 'flex', alignItems: 'center', gap: 12, flexWrap: 'wrap' }}>
        <div style={{
          display: 'flex', alignItems: 'center', gap: 8, flex: 1, minWidth: 200, maxWidth: 360,
          height: 38, padding: '0 12px', background: '#fff', borderRadius: 10, border: '1px solid #E2EAF4',
        }}>
          <Icon name="search" size={16} style={{ color: '#A8B3C7' }}/>
          <input value={search} onChange={e => setSearch(e.target.value)} placeholder="Search by name or SKU…" style={{
            flex: 1, border: 0, background: 'transparent', outline: 'none',
            font: '400 13px/1 Nunito', color: '#0A2E6B',
          }}/>
        </div>
        <div style={{ display: 'flex', gap: 4 }}>
          {CATEGORIES.map(c => (
            <button key={c} onClick={() => setCategory(c)} style={{
              height: 36, padding: '0 14px', border: 0, borderRadius: 8,
              background: category === c ? '#0A2E6B' : '#fff',
              color: category === c ? '#fff' : '#4B5C82',
              font: `${category === c ? 700 : 600} 12px/1 Nunito`,
              cursor: 'pointer', border: category === c ? 'none' : '1px solid #E2EAF4',
              transition: 'all 150ms',
            }}>{c}</button>
          ))}
        </div>
      </div>

      {/* Table */}
      <div style={{ background: '#fff', borderRadius: 16, border: '1px solid #EEF3FB', boxShadow: '0 1px 2px rgba(10,46,107,0.04)', overflow: 'hidden' }}>
        {/* Table header */}
        <div style={{
          display: 'grid', gridTemplateColumns: '40px 1fr 110px 100px 90px 100px 80px 48px',
          padding: '0 20px', borderBottom: '1px solid #F4F7FC', background: '#FAFBFE',
        }}>
          {['', 'Product', 'SKU', 'Category', 'Price', 'Stock', 'Mindy', ''].map((h, i) => (
            <div key={i} style={{ padding: '12px 0', font: '700 11px/1 Nunito', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#A8B3C7' }}>{h}</div>
          ))}
        </div>

        {/* Rows */}
        {filtered.map((p, idx) => {
          const st = STOCK_STYLE[p.stock]
          const isSelected = selected.has(p.id)
          return (
            <div key={p.id} style={{
              display: 'grid', gridTemplateColumns: '40px 1fr 110px 100px 90px 100px 80px 48px',
              padding: '0 20px', borderBottom: idx < filtered.length - 1 ? '1px solid #F4F7FC' : 'none',
              background: isSelected ? '#F4F7FC' : 'transparent',
              transition: 'background 150ms',
            }}
              onMouseEnter={e => { if (!isSelected) e.currentTarget.style.background = '#FAFBFE' }}
              onMouseLeave={e => { if (!isSelected) e.currentTarget.style.background = 'transparent' }}
            >
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <input type="checkbox" checked={isSelected} onChange={() => toggleSelect(p.id)}
                  style={{ cursor: 'pointer', accentColor: '#00B5AE', width: 15, height: 15 }}/>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', gap: 12, padding: '14px 0' }}>
                <div style={{
                  width: 36, height: 36, borderRadius: 8, background: '#F4F7FC',
                  display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0,
                }}>
                  <Icon name="inbox" size={16} style={{ color: '#A8B3C7' }}/>
                </div>
                <div>
                  <div style={{ font: '700 13px/1.2 Nunito', color: '#0A2E6B' }}>{p.name}</div>
                  <div style={{ font: '500 11px/1 Nunito', color: '#A8B3C7', marginTop: 4 }}>qty: {p.qty}</div>
                </div>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', font: '500 12px/1 JetBrains Mono', color: '#7A89A8' }}>{p.sku}</div>
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <span style={{ background: '#E8F0FB', color: '#0A2E6B', borderRadius: 6, font: '600 11px/1 Nunito', padding: '4px 8px' }}>{p.category}</span>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', font: '700 13px/1 Nunito', color: '#0A2E6B' }}>₱{p.price.toLocaleString()}</div>
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <span style={{ background: st.bg, color: st.color, borderRadius: 6, font: '600 11px/1 Nunito', padding: '4px 8px' }}>{st.label}</span>
              </div>
              <div style={{ display: 'flex', alignItems: 'center' }}>
                <MindyToggle on={p.mindy} onChange={() => toggleMindy(p.id)}/>
              </div>
              <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                <button style={{ width: 28, height: 28, borderRadius: 6, border: '1px solid #E2EAF4', background: '#fff', display: 'flex', alignItems: 'center', justifyContent: 'center', color: '#A8B3C7', cursor: 'pointer' }}>
                  <Icon name="more" size={14}/>
                </button>
              </div>
            </div>
          )
        })}

        {filtered.length === 0 && (
          <div style={{ padding: '40px 20px', textAlign: 'center', color: '#A8B3C7', font: '500 13px/1 Nunito' }}>No products match your search.</div>
        )}
      </div>
    </div>
  )
}
