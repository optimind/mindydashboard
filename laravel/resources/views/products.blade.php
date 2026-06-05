@extends('layouts.app')

@section('title', 'Products')
@section('subtitle', 'Catalogue Mindy can answer about')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div class="view-content">

    {{-- ── Header row ──────────────────────────────────────────────── --}}
    <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
      <div style="flex:1;min-width:0">
        <div style="font:800 18px/1.1 Nunito;color:#0A2E6B">Products</div>
        <div style="font:400 13px/1.4 Nunito;color:#7A89A8;margin-top:3px">9 items in catalogue &middot; 7 enabled for Mindy</div>
      </div>
      <button style="padding:9px 18px;border-radius:10px;border:1px solid #D9E4F5;background:#fff;color:#4B5C82;font:600 13px/1 Nunito;cursor:pointer;display:flex;align-items:center;gap:7px">
        <x-icon name="paperclip" :size="14" :stroke="2" />
        Import CSV
      </button>
      <button style="padding:9px 18px;border-radius:10px;border:none;background:#0A2E6B;color:#fff;font:700 13px/1 Nunito;cursor:pointer;display:flex;align-items:center;gap:7px">
        <x-icon name="plus" :size="14" :stroke="2.5" />
        Add product
      </button>
    </div>

    {{-- ── Filter row ──────────────────────────────────────────────── --}}
    <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
      {{-- Search --}}
      <div style="position:relative;flex:1;min-width:200px;max-width:320px">
        <span style="position:absolute;left:11px;top:50%;transform:translateY(-50%);color:#A8B3C7;display:flex">
          <x-icon name="search" :size="15" :stroke="2" />
        </span>
        <input
          id="product-search"
          type="search"
          placeholder="Search products…"
          style="width:100%;box-sizing:border-box;padding:9px 12px 9px 34px;border-radius:10px;border:1px solid #D9E4F5;background:#fff;font:400 13px/1 Nunito;color:#0A2E6B;outline:none"
        />
      </div>
      {{-- Category buttons --}}
      <div style="display:flex;gap:6px;flex-wrap:wrap">
        <button class="cat-btn active" data-cat="All"
          style="padding:8px 16px;border-radius:10px;border:none;font:600 13px/1 Nunito;cursor:pointer;background:#0A2E6B;color:#fff">
          All
        </button>
        <button class="cat-btn" data-cat="Tops"
          style="padding:8px 16px;border-radius:10px;border:1px solid #D9E4F5;font:600 13px/1 Nunito;cursor:pointer;background:#fff;color:#4B5C82">
          Tops
        </button>
        <button class="cat-btn" data-cat="Bottoms"
          style="padding:8px 16px;border-radius:10px;border:1px solid #D9E4F5;font:600 13px/1 Nunito;cursor:pointer;background:#fff;color:#4B5C82">
          Bottoms
        </button>
        <button class="cat-btn" data-cat="Dresses"
          style="padding:8px 16px;border-radius:10px;border:1px solid #D9E4F5;font:600 13px/1 Nunito;cursor:pointer;background:#fff;color:#4B5C82">
          Dresses
        </button>
        <button class="cat-btn" data-cat="Accessories"
          style="padding:8px 16px;border-radius:10px;border:1px solid #D9E4F5;font:600 13px/1 Nunito;cursor:pointer;background:#fff;color:#4B5C82">
          Accessories
        </button>
      </div>
    </div>

    {{-- ── Product table ───────────────────────────────────────────── --}}
    <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

      {{-- Table header --}}
      <div style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:44px;border-bottom:1px solid #EEF3FB;background:#F4F7FC">
        <div>
          <input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" />
        </div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">Product</div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">SKU</div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">Category</div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">Price</div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">Stock</div>
        <div style="font:700 11px/1 Nunito;color:#7A89A8;text-transform:uppercase;letter-spacing:.04em">Mindy</div>
        <div></div>
      </div>

      {{-- ── Row 1: Red Floral Wrap Dress ── --}}
      <div class="product-row" data-cat="Dresses" data-name="red floral wrap dress" data-sku="rf-2204"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Red Floral Wrap Dress</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Dresses</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">RF-2204</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Dresses</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱1,299</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 14</span></div>
        <div>
          <button class="mindy-toggle on" data-id="1" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 2: Classic White Polo Shirt ── --}}
      <div class="product-row" data-cat="Tops" data-name="classic white polo shirt" data-sku="wp-1102"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Classic White Polo Shirt</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Tops</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">WP-1102</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Tops</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱899</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 32</span></div>
        <div>
          <button class="mindy-toggle on" data-id="2" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 3: Blue Denim Jeans (Slim) ── --}}
      <div class="product-row" data-cat="Bottoms" data-name="blue denim jeans slim" data-sku="dj-3301"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Blue Denim Jeans (Slim)</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Bottoms</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">DJ-3301</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Bottoms</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱1,599</div>
        <div><span style="background:#FFF6E3;color:#C98A2E;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Low stock · 3</span></div>
        <div>
          <button class="mindy-toggle on" data-id="3" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 4: Summer Floral Blouse ── --}}
      <div class="product-row" data-cat="Tops" data-name="summer floral blouse" data-sku="fb-2208"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Summer Floral Blouse</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Tops</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">FB-2208</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Tops</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱1,099</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 21</span></div>
        <div>
          <button class="mindy-toggle on" data-id="4" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 5: Black Leather Tote Bag ── --}}
      <div class="product-row" data-cat="Accessories" data-name="black leather tote bag" data-sku="bt-5501"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Black Leather Tote Bag</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Accessories</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">BT-5501</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Accessories</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱2,499</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 8</span></div>
        <div>
          <button class="mindy-toggle on" data-id="5" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 6: Gold Hoop Earrings Set (Mindy OFF) ── --}}
      <div class="product-row" data-cat="Accessories" data-name="gold hoop earrings set" data-sku="ge-6603"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB;background:#FAFBFE">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#A8B3C7">Gold Hoop Earrings Set</div>
          <div style="font:400 11px/1.3 Nunito;color:#C8D0E0;margin-top:2px">Accessories</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#C8D0E0">GE-6603</div>
        <div><span style="background:#F4F7FC;color:#C8D0E0;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Accessories</span></div>
        <div style="font:600 13px/1 Nunito;color:#A8B3C7">₱599</div>
        <div><span style="background:#FFEEEB;color:#C94E3F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Out of stock</span></div>
        <div>
          <button class="mindy-toggle" data-id="6" style="width:40px;height:24px;border-radius:12px;border:none;background:#D9E4F5;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 7: Silk Scarf (Floral Print) ── --}}
      <div class="product-row" data-cat="Accessories" data-name="silk scarf floral print" data-sku="ss-6610"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Silk Scarf (Floral Print)</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Accessories</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">SS-6610</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Accessories</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱799</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 17</span></div>
        <div>
          <button class="mindy-toggle on" data-id="7" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 8: High-Waist Linen Trousers (Mindy OFF) ── --}}
      <div class="product-row" data-cat="Bottoms" data-name="high-waist linen trousers" data-sku="lt-3308"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px;border-bottom:1px solid #EEF3FB;background:#FAFBFE">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#A8B3C7">High-Waist Linen Trousers</div>
          <div style="font:400 11px/1.3 Nunito;color:#C8D0E0;margin-top:2px">Bottoms</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#C8D0E0">LT-3308</div>
        <div><span style="background:#F4F7FC;color:#C8D0E0;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Bottoms</span></div>
        <div style="font:600 13px/1 Nunito;color:#A8B3C7">₱1,399</div>
        <div><span style="background:#FFF6E3;color:#C98A2E;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Low stock · 2</span></div>
        <div>
          <button class="mindy-toggle" data-id="8" style="width:40px;height:24px;border-radius:12px;border:none;background:#D9E4F5;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- ── Row 9: Striped Cotton Tee ── --}}
      <div class="product-row" data-cat="Tops" data-name="striped cotton tee" data-sku="st-1115"
        style="display:grid;grid-template-columns:40px 1fr 110px 100px 90px 100px 80px 48px;align-items:center;padding:0 20px;height:60px">
        <div><input type="checkbox" style="width:16px;height:16px;accent-color:#0A2E6B;cursor:pointer" /></div>
        <div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Striped Cotton Tee</div>
          <div style="font:400 11px/1.3 Nunito;color:#A8B3C7;margin-top:2px">Tops</div>
        </div>
        <div style="font:500 12px/1 JetBrains Mono,monospace;color:#7A89A8">ST-1115</div>
        <div><span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">Tops</span></div>
        <div style="font:600 13px/1 Nunito;color:#0A2E6B">₱699</div>
        <div><span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">In stock · 45</span></div>
        <div>
          <button class="mindy-toggle on" data-id="9" style="width:40px;height:24px;border-radius:12px;border:none;background:#00B5AE;position:relative;cursor:pointer;flex-shrink:0">
            <span style="position:absolute;top:2px;left:18px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </button>
        </div>
        <div style="display:flex;justify-content:center">
          <button style="width:32px;height:32px;border-radius:8px;border:1px solid #EEF3FB;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#7A89A8">
            <x-icon name="more" :size="16" :stroke="2" />
          </button>
        </div>
      </div>

    </div>{{-- /table --}}

  </div>{{-- /.view-content --}}
</div>
@endsection

<script>
// Search + category filter
function filterProducts() {
  const search = document.getElementById('product-search').value.toLowerCase();
  const cat = document.querySelector('.cat-btn.active')?.dataset.cat || 'All';
  document.querySelectorAll('.product-row').forEach(row => {
    const matchSearch = row.dataset.name.includes(search) || row.dataset.sku.includes(search);
    const matchCat = cat === 'All' || row.dataset.cat === cat;
    row.style.display = matchSearch && matchCat ? 'grid' : 'none';
  });
}
document.getElementById('product-search').addEventListener('input', filterProducts);
document.querySelectorAll('.cat-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.cat-btn').forEach(b => {
      b.classList.remove('active');
      b.style.background = '#fff';
      b.style.color = '#4B5C82';
      b.style.border = '1px solid #D9E4F5';
    });
    this.classList.add('active');
    this.style.background = '#0A2E6B';
    this.style.color = '#fff';
    this.style.border = 'none';
    filterProducts();
  });
});
// Mindy toggles
document.querySelectorAll('.mindy-toggle').forEach(btn => {
  btn.addEventListener('click', function() {
    this.classList.toggle('on');
    const dot = this.querySelector('span');
    dot.style.left = this.classList.contains('on') ? '18px' : '2px';
    this.style.background = this.classList.contains('on') ? '#00B5AE' : '#D9E4F5';
  });
});
</script>
