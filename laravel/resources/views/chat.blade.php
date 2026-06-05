@extends('layouts.app')

@section('title', 'Chat')
@section('subtitle', 'Live conversations')

@section('content')
<div style="flex:1;display:flex;overflow:hidden;background:#F4F7FC">

  {{-- ═══════════════════════════════════════════
       CONVERSATION LIST  (320px)
  ════════════════════════════════════════════ --}}
  <div style="width:320px;flex-shrink:0;background:#fff;border-right:1px solid #EEF3FB;display:flex;flex-direction:column;overflow:hidden">

    {{-- Header --}}
    <div style="padding:20px 16px 0">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
        <div style="font:800 16px/1 Nunito;color:#0A2E6B;flex:1">Conversations</div>
        <span style="background:#F27262;color:#fff;font:700 11px/1 Nunito;padding:2px 7px;border-radius:20px;min-width:20px;text-align:center">3</span>
      </div>
      {{-- Search --}}
      <div style="position:relative;margin-bottom:12px">
        <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#A8B3C7;display:flex">
          <x-icon name="search" :size="14" :stroke="2" />
        </span>
        <input type="search" placeholder="Search conversations…" style="width:100%;box-sizing:border-box;padding:8px 10px 8px 32px;border-radius:10px;border:1px solid #D9E4F5;background:#F4F7FC;font:400 13px/1 Nunito;color:#0A2E6B;outline:none" />
      </div>
      {{-- Filter tabs --}}
      <div style="display:flex;gap:4px;margin-bottom:4px">
        <button class="chat-filter-btn active" data-filter="all"
          style="flex:1;padding:6px 4px;border-radius:8px;border:none;font:600 11px/1 Nunito;cursor:pointer;background:#0A2E6B;color:#fff">
          All active
        </button>
        <button class="chat-filter-btn" data-filter="active"
          style="flex:1;padding:6px 4px;border-radius:8px;border:none;font:600 11px/1 Nunito;cursor:pointer;background:transparent;color:#7A89A8">
          Active
        </button>
        <button class="chat-filter-btn" data-filter="escalated"
          style="flex:1;padding:6px 4px;border-radius:8px;border:none;font:600 11px/1 Nunito;cursor:pointer;background:transparent;color:#7A89A8">
          Escalated
        </button>
        <button class="chat-filter-btn" data-filter="resolved"
          style="flex:1;padding:6px 4px;border-radius:8px;border:none;font:600 11px/1 Nunito;cursor:pointer;background:transparent;color:#7A89A8">
          Resolved
        </button>
      </div>
    </div>

    {{-- Conversation items --}}
    <div style="flex:1;overflow-y:auto;padding:8px 0">

      {{-- 0: Priya Shah — active, unread 2 — SELECTED --}}
      <div class="conv-item" data-conv-id="0" data-status="active"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid #00B5AE;background:#F4F7FC;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          {{-- Avatar --}}
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">PS</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#00B5AE;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Priya Shah</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">2m ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">Yes please! Can I reserve it under Priya Shah?</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#E0F7F5;color:#00756F;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">active</span>
              <span style="background:#F27262;color:#fff;font:700 10px/1 Nunito;padding:2px 6px;border-radius:20px;margin-left:auto">2</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 1: Diego Fuentes — active, unread 1 --}}
      <div class="conv-item" data-conv-id="1" data-status="active"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid transparent;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#00B5AE;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">DF</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#00B5AE;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Diego Fuentes</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">5m ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">What time does the BGC branch close today?</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#E0F7F5;color:#00756F;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">active</span>
              <span style="background:#F27262;color:#fff;font:700 10px/1 Nunito;padding:2px 6px;border-radius:20px;margin-left:auto">1</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 2: Eliza Nguyen — active, unread 0 --}}
      <div class="conv-item" data-conv-id="2" data-status="active"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid transparent;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#F5B44F;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">EN</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#00B5AE;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Eliza Nguyen</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">8m ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">Is the buy-1-take-1 promo still available?</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#E0F7F5;color:#00756F;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">active</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 3: Jules Carter — escalated, unread 0 --}}
      <div class="conv-item" data-conv-id="3" data-status="escalated"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid transparent;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#F27262;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">JC</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#F5B44F;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Jules Carter</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">1h ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">I want a full refund for my order #4821</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#FFF6E3;color:#C98A2E;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">escalated</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 4: Marcus Hill — resolved, unread 0 --}}
      <div class="conv-item" data-conv-id="4" data-status="resolved"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid transparent;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">MH</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#A8B3C7;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Marcus Hill</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">15m ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">Thanks for the confirmation! Really helpful.</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#F4F7FC;color:#A8B3C7;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">resolved</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 5: Ryan Santos — resolved, unread 0 --}}
      <div class="conv-item" data-conv-id="5" data-status="resolved"
        style="display:block;padding:12px 16px;cursor:pointer;border-left:3px solid transparent;position:relative">
        <div style="display:flex;align-items:flex-start;gap:10px">
          <div style="position:relative;flex-shrink:0">
            <div style="width:42px;height:42px;border-radius:50%;background:#9FB5E3;display:flex;align-items:center;justify-content:center;font:700 14px/1 Nunito;color:#fff">RS</div>
            <span style="position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#A8B3C7;border:2px solid #fff"></span>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:3px">
              <div style="font:700 13px/1 Nunito;color:#0A2E6B">Ryan Santos</div>
              <div style="font:400 11px/1 Nunito;color:#A8B3C7;flex-shrink:0">2h ago</div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#4B5C82;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px">Got it, thank you so much!</div>
            <div style="display:flex;align-items:center;gap:5px;flex-wrap:wrap">
              <span style="background:#E8F0FB;color:#4A6AB0;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">Messenger</span>
              <span style="background:#F4F7FC;color:#A8B3C7;font:600 10px/1 Nunito;padding:2px 7px;border-radius:20px">resolved</span>
            </div>
          </div>
        </div>
      </div>

    </div>{{-- /conversation items --}}
  </div>{{-- /conversation list --}}


  {{-- ═══════════════════════════════════════════
       CHAT WINDOW  (flex:1)
  ════════════════════════════════════════════ --}}
  <div style="flex:1;display:flex;flex-direction:column;overflow:hidden;min-width:0">

    {{-- Chat header --}}
    <div style="height:64px;background:#fff;border-bottom:1px solid #EEF3FB;display:flex;align-items:center;padding:0 20px;gap:12px;flex-shrink:0">
      <div style="position:relative;flex-shrink:0">
        <div style="width:40px;height:40px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 13px/1 Nunito;color:#fff">PS</div>
        <span style="position:absolute;bottom:1px;right:1px;width:9px;height:9px;border-radius:50%;background:#00B5AE;border:2px solid #fff"></span>
      </div>
      <div style="flex:1;min-width:0">
        <div style="display:flex;align-items:center;gap:8px">
          <div style="font:700 15px/1 Nunito;color:#0A2E6B">Priya Shah</div>
          <span style="background:#E0F7F5;color:#00756F;font:600 10px/1 Nunito;padding:2px 8px;border-radius:20px">active</span>
        </div>
        <div style="font:400 12px/1 Nunito;color:#A8B3C7;margin-top:3px">via Messenger · 2m ago</div>
      </div>
      <button style="padding:8px 18px;border-radius:10px;border:none;background:#00B5AE;color:#fff;font:700 13px/1 Nunito;cursor:pointer">Resolve</button>
      <button style="width:36px;height:36px;border-radius:10px;border:1px solid #D9E4F5;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#7A89A8">
        <x-icon name="more" :size="18" :stroke="2" />
      </button>
    </div>

    {{-- Messages area --}}
    <div style="flex:1;overflow-y:auto;padding:20px 24px;display:flex;flex-direction:column;gap:14px;background:#F4F7FC">

      {{-- User: Hi! Do you have the red floral dress... --}}
      <div style="display:flex;align-items:flex-end;gap:8px">
        <div style="width:28px;height:28px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 10px/1 Nunito;color:#fff;flex-shrink:0">PS</div>
        <div style="max-width:68%">
          <div style="background:#fff;border:1px solid #EEF3FB;border-radius:14px 14px 14px 4px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#0A2E6B">
            Hi! Do you have the red floral dress in size S?
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-left:4px">2:01p</div>
        </div>
      </div>

      {{-- Mindy: Hi Priya! --}}
      <div style="display:flex;align-items:flex-end;gap:8px;flex-direction:row-reverse">
        <div style="width:28px;height:28px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#00B5AE">
          <x-icon name="bolt" :size="14" :stroke="2" />
        </div>
        <div style="max-width:68%">
          <div style="background:#0A2E6B;border-radius:14px 14px 4px 14px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#fff">
            Hi Priya! Let me check our inventory for you 😊
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-right:4px;text-align:right">2:01p</div>
        </div>
      </div>

      {{-- Mindy: Great news! --}}
      <div style="display:flex;align-items:flex-end;gap:8px;flex-direction:row-reverse">
        <div style="width:28px;height:28px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#00B5AE">
          <x-icon name="bolt" :size="14" :stroke="2" />
        </div>
        <div style="max-width:68%">
          <div style="background:#0A2E6B;border-radius:14px 14px 4px 14px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#fff">
            Great news! The Red Floral Wrap Dress (SKU #RF-2204) is available in Size S, priced at ₱1,299.
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-right:4px;text-align:right">2:01p</div>
        </div>
      </div>

      {{-- User: Perfect! Is it available for same-day pickup... --}}
      <div style="display:flex;align-items:flex-end;gap:8px">
        <div style="width:28px;height:28px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 10px/1 Nunito;color:#fff;flex-shrink:0">PS</div>
        <div style="max-width:68%">
          <div style="background:#fff;border:1px solid #EEF3FB;border-radius:14px 14px 14px 4px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#0A2E6B">
            Perfect! Is it available for same-day pickup at the Makati branch?
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-left:4px">2:02p</div>
        </div>
      </div>

      {{-- Mindy: Yes! The Makati branch... --}}
      <div style="display:flex;align-items:flex-end;gap:8px;flex-direction:row-reverse">
        <div style="width:28px;height:28px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#00B5AE">
          <x-icon name="bolt" :size="14" :stroke="2" />
        </div>
        <div style="max-width:68%">
          <div style="background:#0A2E6B;border-radius:14px 14px 4px 14px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#fff">
            Yes! The Makati branch currently has 3 units in stock. You can pick it up today until 9 PM.
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-right:4px;text-align:right">2:02p</div>
        </div>
      </div>

      {{-- User: Yes please! Can I reserve it... --}}
      <div style="display:flex;align-items:flex-end;gap:8px">
        <div style="width:28px;height:28px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 10px/1 Nunito;color:#fff;flex-shrink:0">PS</div>
        <div style="max-width:68%">
          <div style="background:#fff;border:1px solid #EEF3FB;border-radius:14px 14px 14px 4px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#0A2E6B">
            Yes please! Can I reserve it under Priya Shah?
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-left:4px">2:03p</div>
        </div>
      </div>

      {{-- Mindy: Done! I've reserved... --}}
      <div style="display:flex;align-items:flex-end;gap:8px;flex-direction:row-reverse">
        <div style="width:28px;height:28px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#00B5AE">
          <x-icon name="bolt" :size="14" :stroke="2" />
        </div>
        <div style="max-width:68%">
          <div style="background:#0A2E6B;border-radius:14px 14px 4px 14px;padding:10px 14px;font:400 13px/1.5 Nunito;color:#fff">
            Done! I've reserved 1 unit of the Red Floral Wrap Dress (Size S) under Priya Shah at the Makati branch. Please claim it within 24 hours. 🎉
          </div>
          <div style="font:400 10px/1 Nunito;color:#A8B3C7;margin-top:4px;padding-right:4px;text-align:right">2:03p</div>
        </div>
      </div>

    </div>{{-- /messages area --}}

    {{-- Input bar --}}
    <div style="padding:14px 20px;background:#fff;border-top:1px solid #EEF3FB;display:flex;align-items:center;gap:10px;flex-shrink:0">
      <div style="flex:1;padding:10px 14px;border-radius:12px;background:#F4F7FC;border:1px solid #EEF3FB;font:400 13px/1 Nunito;color:#A8B3C7">
        Mindy handles responses automatically. Manual reply is disabled.
      </div>
      <button disabled style="width:40px;height:40px;border-radius:10px;border:none;background:#D9E4F5;display:flex;align-items:center;justify-content:center;cursor:not-allowed;color:#A8B3C7;flex-shrink:0">
        <x-icon name="send" :size="16" :stroke="2" />
      </button>
    </div>

  </div>{{-- /chat window --}}


  {{-- ═══════════════════════════════════════════
       CUSTOMER INFO PANEL  (260px)
  ════════════════════════════════════════════ --}}
  <div style="width:260px;flex-shrink:0;background:#fff;border-left:1px solid #EEF3FB;display:flex;flex-direction:column;overflow-y:auto">

    {{-- Customer header --}}
    <div style="padding:24px 20px 16px;text-align:center;border-bottom:1px solid #EEF3FB">
      <div style="width:56px;height:56px;border-radius:50%;background:#6B8ED6;display:flex;align-items:center;justify-content:center;font:700 18px/1 Nunito;color:#fff;margin:0 auto 10px">PS</div>
      <div style="font:800 15px/1 Nunito;color:#0A2E6B">Priya Shah</div>
      <div style="font:400 12px/1 Nunito;color:#A8B3C7;margin-top:4px">via Messenger</div>
    </div>

    {{-- Fields --}}
    <div style="padding:16px 20px;display:flex;flex-direction:column;gap:14px">

      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="font:500 12px/1 Nunito;color:#7A89A8">Status</div>
        <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px;display:flex;align-items:center;gap:4px">
          <span style="width:6px;height:6px;border-radius:50%;background:#00B5AE;display:inline-block"></span>
          Active
        </span>
      </div>

      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="font:500 12px/1 Nunito;color:#7A89A8">Session start</div>
        <div style="font:600 12px/1 Nunito;color:#0A2E6B">Today 2:01 PM</div>
      </div>

      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="font:500 12px/1 Nunito;color:#7A89A8">Messages</div>
        <div style="font:600 12px/1 Nunito;color:#0A2E6B">7 messages</div>
      </div>

      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="font:500 12px/1 Nunito;color:#7A89A8">Channel</div>
        <div style="font:600 12px/1 Nunito;color:#0A2E6B">Messenger</div>
      </div>

      <div style="height:1px;background:#EEF3FB"></div>

      {{-- Intent tags --}}
      <div>
        <div style="font:600 12px/1 Nunito;color:#7A89A8;margin-bottom:8px">Intent</div>
        <div style="display:flex;flex-wrap:wrap;gap:6px">
          <span style="background:#E8F0FB;color:#4A6AB0;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px">Product inquiry</span>
          <span style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px">Reservation</span>
        </div>
      </div>

      <button style="width:100%;padding:10px;border-radius:10px;border:1px solid #D9E4F5;background:#fff;color:#0A2E6B;font:700 13px/1 Nunito;cursor:pointer;margin-top:4px">
        View history
      </button>

    </div>{{-- /fields --}}

  </div>{{-- /customer info panel --}}

</div>
@endsection

<script>
// Chat filter tabs
document.querySelectorAll('.chat-filter-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.chat-filter-btn').forEach(b => {
      b.classList.remove('active');
      b.style.background = 'transparent';
      b.style.color = '#7A89A8';
    });
    this.classList.add('active');
    this.style.background = '#0A2E6B';
    this.style.color = '#fff';
    const filter = this.dataset.filter;
    document.querySelectorAll('.conv-item').forEach(item => {
      const show = filter === 'all' || item.dataset.status === filter;
      item.style.display = show ? 'block' : 'none';
    });
  });
});
</script>
