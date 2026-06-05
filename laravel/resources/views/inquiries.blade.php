@extends('layouts.app')

@section('title', 'Inquiries')
@section('subtitle', 'All conversations and detected intents')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div style="padding:28px;display:flex;flex-direction:column;gap:20px">

    {{-- Header row --}}
    <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">
      <div style="flex:1">
        <div style="font:800 22px/1.1 Nunito;color:#0A2E6B;letter-spacing:-0.02em">Inquiries</div>
        <div style="font:400 13px/1.4 Nunito;color:#4B5C82;margin-top:4px">All conversations and detected intents</div>
      </div>
      <button style="display:flex;align-items:center;gap:7px;padding:8px 16px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;color:#4B5C82;font:600 13px/1 Nunito;cursor:pointer">
        <x-icon name="paperclip" :size="14" :stroke="2" />
        Export
      </button>
    </div>

    {{-- Stat cards --}}
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px">

      {{-- Total inquiries --}}
      <div style="background:#fff;border-radius:14px;padding:16px 20px;border:1px solid #EEF3FB">
        <div style="display:flex;align-items:flex-start;gap:12px">
          <div style="width:40px;height:40px;border-radius:10px;background:#00B5AE1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <x-icon name="message" :size="20" :stroke="2" style="color:#00B5AE" />
          </div>
          <div style="flex:1;min-width:0">
            <div style="font:800 24px/1 Nunito;color:#0A2E6B">979</div>
            <div style="font:500 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Total inquiries</div>
          </div>
          <div style="margin-left:auto;background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 8px;border-radius:20px;white-space:nowrap;flex-shrink:0">+18%</div>
        </div>
      </div>

      {{-- Resolved by Mindy --}}
      <div style="background:#fff;border-radius:14px;padding:16px 20px;border:1px solid #EEF3FB">
        <div style="display:flex;align-items:flex-start;gap:12px">
          <div style="width:40px;height:40px;border-radius:10px;background:#0A2E6B1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <x-icon name="check" :size="20" :stroke="2" style="color:#0A2E6B" />
          </div>
          <div style="flex:1;min-width:0">
            <div style="font:800 24px/1 Nunito;color:#0A2E6B">912</div>
            <div style="font:500 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Resolved by Mindy</div>
          </div>
          <div style="margin-left:auto;background:#E8F0FB;color:#4A6AB0;font:600 11px/1 Nunito;padding:4px 8px;border-radius:20px;white-space:nowrap;flex-shrink:0">93%</div>
        </div>
      </div>

      {{-- Escalated --}}
      <div style="background:#fff;border-radius:14px;padding:16px 20px;border:1px solid #EEF3FB">
        <div style="display:flex;align-items:flex-start;gap:12px">
          <div style="width:40px;height:40px;border-radius:10px;background:#F5B44F1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <x-icon name="alert" :size="20" :stroke="2" style="color:#F5B44F" />
          </div>
          <div style="flex:1;min-width:0">
            <div style="font:800 24px/1 Nunito;color:#0A2E6B">28</div>
            <div style="font:500 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Escalated</div>
          </div>
          <div style="margin-left:auto;background:#FFEEEB;color:#C94E3F;font:600 11px/1 Nunito;padding:4px 8px;border-radius:20px;white-space:nowrap;flex-shrink:0">−4</div>
        </div>
      </div>

      {{-- Avg handle time --}}
      <div style="background:#fff;border-radius:14px;padding:16px 20px;border:1px solid #EEF3FB">
        <div style="display:flex;align-items:flex-start;gap:12px">
          <div style="width:40px;height:40px;border-radius:10px;background:#F272621A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <x-icon name="clock" :size="20" :stroke="2" style="color:#F27262" />
          </div>
          <div style="flex:1;min-width:0">
            <div style="font:800 24px/1 Nunito;color:#0A2E6B">1.8s</div>
            <div style="font:500 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Avg handle time</div>
          </div>
          <div style="margin-left:auto;background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 8px;border-radius:20px;white-space:nowrap;flex-shrink:0">faster</div>
        </div>
      </div>

    </div>{{-- /stat cards --}}

    {{-- Filters row --}}
    <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">

      {{-- Search --}}
      <div style="position:relative;flex:1;max-width:340px">
        <span style="position:absolute;left:11px;top:50%;transform:translateY(-50%);display:flex;align-items:center;pointer-events:none;color:#A8B3C7">
          <x-icon name="search" :size="15" :stroke="2" />
        </span>
        <input
          id="inq-search"
          type="search"
          placeholder="Search customer or message…"
          autocomplete="off"
          style="width:100%;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px 0 34px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box"
        />
      </div>

      {{-- Status segmented control --}}
      <div style="display:flex;align-items:center;background:#fff;border-radius:10px;border:1px solid #E2EAF4;padding:3px;gap:2px">
        <button class="inq-status-btn active" data-status="all"
          style="padding:6px 14px;border-radius:8px;border:none;background:#0A2E6B;color:#fff;font:600 12px/1 Nunito;cursor:pointer">
          All
        </button>
        <button class="inq-status-btn" data-status="active"
          style="padding:6px 14px;border-radius:8px;border:none;background:transparent;color:#4B5C82;font:600 12px/1 Nunito;cursor:pointer">
          Active
        </button>
        <button class="inq-status-btn" data-status="resolved"
          style="padding:6px 14px;border-radius:8px;border:none;background:transparent;color:#4B5C82;font:600 12px/1 Nunito;cursor:pointer">
          Resolved
        </button>
        <button class="inq-status-btn" data-status="escalated"
          style="padding:6px 14px;border-radius:8px;border:none;background:transparent;color:#4B5C82;font:600 12px/1 Nunito;cursor:pointer">
          Escalated
        </button>
      </div>

      {{-- Category select --}}
      <select id="inq-cat-select"
        style="height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#4B5C82;outline:none;cursor:pointer">
        <option value="All">All categories</option>
        <option value="Product inquiry">Product inquiry</option>
        <option value="Brand inquiry">Brand inquiry</option>
        <option value="Location">Location</option>
        <option value="Promo">Promo</option>
        <option value="Sponsorship">Sponsorship</option>
      </select>

    </div>{{-- /filters --}}

    {{-- Table --}}
    <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

      {{-- Table header --}}
      <div style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #EEF3FB">
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0">Customer</div>
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0">Message</div>
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0">Category</div>
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0">Date</div>
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0">Status</div>
        <div style="font:700 11px/1 Nunito;color:#A8B3C7;text-transform:uppercase;letter-spacing:.06em;padding:13px 0"></div>
      </div>

      {{-- Row 1: Priya Shah, Product inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Product inquiry"
        data-customer="priya shah" data-message="do you have the red floral dress in size s?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#0A2E6B">PS</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Priya Shah</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Do you have the red floral dress in size S?</div>
        <div style="padding:14px 0">
          <span style="background:#E8F0FB;color:#0A2E6B;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Product inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 2:01p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 2: Diego Fuentes, Location, active --}}
      <div class="inq-row" data-status="active" data-cat="Location"
        data-customer="diego fuentes" data-message="what time does the bgc branch close today?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#EEF2FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#4A6AB0">DF</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Diego Fuentes</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">What time does the BGC branch close today?</div>
        <div style="padding:14px 0">
          <span style="background:#EEF2FF;color:#4A6AB0;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Location</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 2:00p</div>
        <div style="padding:14px 0">
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Active</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 3: Eliza Nguyen, Promo, active --}}
      <div class="inq-row" data-status="active" data-cat="Promo"
        data-customer="eliza nguyen" data-message="is the buy-1-take-1 promo still available?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#FFF6E3;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#C98A2E">EN</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Eliza Nguyen</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Is the buy-1-take-1 promo still available?</div>
        <div style="padding:14px 0">
          <span style="background:#FFF6E3;color:#C98A2E;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Promo</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 1:57p</div>
        <div style="padding:14px 0">
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Active</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 4: Jules Carter, Sponsorship, escalated --}}
      <div class="inq-row" data-status="escalated" data-cat="Sponsorship"
        data-customer="jules carter" data-message="i want a full refund for my order #4821"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#FFEEEB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#C94E3F">JC</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Jules Carter</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">I want a full refund for my order #4821</div>
        <div style="padding:14px 0">
          <span style="background:#FFEEEB;color:#C94E3F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Sponsorship</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 1:13p</div>
        <div style="padding:14px 0">
          <span style="background:#FFF6E3;color:#C98A2E;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Escalated</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 5: Marcus Hill, Product inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Product inquiry"
        data-customer="marcus hill" data-message="can you resend my order confirmation for #3309?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#0A2E6B">MH</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Marcus Hill</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Can you resend my order confirmation for #3309?</div>
        <div style="padding:14px 0">
          <span style="background:#E8F0FB;color:#0A2E6B;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Product inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 1:44p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 6: Ryan Santos, Location, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Location"
        data-customer="ryan santos" data-message="what are your store locations in quezon city?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#EEF2FF;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#4A6AB0">RS</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Ryan Santos</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">What are your store locations in Quezon City?</div>
        <div style="padding:14px 0">
          <span style="background:#EEF2FF;color:#4A6AB0;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Location</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 6 11:20a</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 7: Ana Reyes, Sponsorship, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Sponsorship"
        data-customer="ana reyes" data-message="do you sponsor local school events?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#FFEEEB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#C94E3F">AR</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Ana Reyes</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Do you sponsor local school events?</div>
        <div style="padding:14px 0">
          <span style="background:#FFEEEB;color:#C94E3F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Sponsorship</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 5 3:44p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 8: Carlo Bautista, Product inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Product inquiry"
        data-customer="carlo bautista" data-message="is this jacket available in size xl?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#0A2E6B">CB</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Carlo Bautista</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Is this jacket available in size XL?</div>
        <div style="padding:14px 0">
          <span style="background:#E8F0FB;color:#0A2E6B;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Product inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 5 2:12p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 9: Sofia Lim, Brand inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Brand inquiry"
        data-customer="sofia lim" data-message="what are the payment options available?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#00756F">SL</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Sofia Lim</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">What are the payment options available?</div>
        <div style="padding:14px 0">
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Brand inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 5 11:05a</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 10: James Tan, Brand inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Brand inquiry"
        data-customer="james tan" data-message="can i return an item bought online to the store?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#00756F">JT</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">James Tan</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Can I return an item bought online to the store?</div>
        <div style="padding:14px 0">
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Brand inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 4 4:30p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 11: Maria Cruz, Brand inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Brand inquiry"
        data-customer="maria cruz" data-message="do you have a loyalty points program?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;border-bottom:1px solid #F4F7FC;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#00756F">MC</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Maria Cruz</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">Do you have a loyalty points program?</div>
        <div style="padding:14px 0">
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Brand inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 4 2:15p</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

      {{-- Row 12: Kevin Delos, Product inquiry, resolved --}}
      <div class="inq-row" data-status="resolved" data-cat="Product inquiry"
        data-customer="kevin delos" data-message="how long does shipping usually take?"
        style="display:grid;grid-template-columns:1.4fr 2fr 130px 120px 110px 80px;padding:0 20px;align-items:center">
        <div style="padding:14px 0;display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:50%;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 11px/1 Nunito;color:#0A2E6B">KD</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">Kevin Delos</div>
        </div>
        <div style="padding:14px 0;font:400 13px/1.4 Nunito;color:#4B5C82;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding-right:16px">How long does shipping usually take?</div>
        <div style="padding:14px 0">
          <span style="background:#E8F0FB;color:#0A2E6B;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px;white-space:nowrap">Product inquiry</span>
        </div>
        <div style="padding:14px 0;font:500 12px/1 Nunito;color:#7A89A8">May 3 9:45a</div>
        <div style="padding:14px 0">
          <span style="background:#F4F7FC;color:#4B5C82;font:600 11px/1 Nunito;padding:4px 9px;border-radius:20px">Resolved</span>
        </div>
        <div style="padding:14px 0;display:flex;justify-content:flex-end">
          <button style="width:28px;height:28px;border-radius:8px;border:1px solid #E2EAF4;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
            <x-icon name="arrow-right" :size="13" :stroke="2" />
          </button>
        </div>
      </div>

    </div>{{-- /table --}}

  </div>
</div>

<style>
.inq-status-btn { transition: background .15s, color .15s; }
.inq-status-btn.active { background: #0A2E6B !important; color: #fff !important; }
.inq-status-btn:not(.active):hover { background: #F4F7FC !important; }
</style>

<script>
function filterInquiries() {
  const search = document.getElementById('inq-search').value.toLowerCase();
  const status = document.querySelector('.inq-status-btn.active')?.dataset.status || 'all';
  const cat = document.getElementById('inq-cat-select').value;
  document.querySelectorAll('.inq-row').forEach(row => {
    const matchSearch = row.dataset.customer.includes(search) || row.dataset.message.includes(search);
    const matchStatus = status === 'all' || row.dataset.status === status;
    const matchCat = cat === 'All' || row.dataset.cat === cat;
    row.style.display = matchSearch && matchStatus && matchCat ? 'grid' : 'none';
  });
}
document.getElementById('inq-search').addEventListener('input', filterInquiries);
document.getElementById('inq-cat-select').addEventListener('change', filterInquiries);
document.querySelectorAll('.inq-status-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.inq-status-btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
    filterInquiries();
  });
});
</script>
@endsection
