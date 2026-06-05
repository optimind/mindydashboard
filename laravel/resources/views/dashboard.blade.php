@extends('layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Your chatbot, at a glance')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div class="view-content">

    {{-- Greeting row --}}
    <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">
      <div style="flex:1">
        <div style="font:800 22px/1.1 Nunito;color:#0A2E6B;letter-spacing:-0.02em">Good morning, Wendy 👋</div>
        <div style="font:400 13px/1.4 Nunito;color:#4B5C82;margin-top:4px">Here's what's happening with Mindy today.</div>
      </div>
      <div style="font:500 12px/1 Nunito;color:#7A89A8">May 6, 2026 · 2:01 PM</div>
    </div>

    {{-- KPI strip --}}
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px">

      {{-- Total inquiries --}}
      <div style="background:#fff;border-radius:14px;padding:16px 20px;border:1px solid #EEF3FB">
        <div style="display:flex;align-items:flex-start;gap:12px">
          <div style="width:40px;height:40px;border-radius:10px;background:#00B5AE1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <x-icon name="message" :size="20" style="color:#00B5AE" />
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
            <x-icon name="check" :size="20" style="color:#0A2E6B" />
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
            <x-icon name="alert" :size="20" style="color:#F5B44F" />
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
            <x-icon name="clock" :size="20" style="color:#F27262" />
          </div>
          <div style="flex:1;min-width:0">
            <div style="font:800 24px/1 Nunito;color:#0A2E6B">1.8s</div>
            <div style="font:500 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Avg handle time</div>
          </div>
          <div style="margin-left:auto;background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 8px;border-radius:20px;white-space:nowrap;flex-shrink:0">faster</div>
        </div>
      </div>

    </div>{{-- /KPI strip --}}

    {{-- Account card + toggle section --}}
    <div style="display:grid;grid-template-columns:1fr 340px;gap:16px">

      {{-- Connected Account --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px">
        <div style="font:800 15px/1 Nunito;color:#0A2E6B;margin-bottom:16px">Connected Account</div>
        <div style="display:flex;align-items:center;gap:14px">
          {{-- Facebook icon --}}
          <div style="width:52px;height:52px;border-radius:14px;background:#1877F2;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
            </svg>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
              <div style="font:700 15px/1 Nunito;color:#0A2E6B">Optimind PH</div>
              <div style="display:flex;align-items:center;gap:5px;background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:3px 9px;border-radius:20px">
                <span style="width:6px;height:6px;border-radius:50%;background:#00B5AE;display:inline-block"></span>
                Connected
              </div>
            </div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Facebook Page · Page ID: 1209384756</div>
          </div>
          <button style="flex-shrink:0;padding:8px 16px;border-radius:10px;border:1px solid #D9E4F5;background:#fff;color:#4B5C82;font:600 13px/1 Nunito;cursor:pointer">
            Reconfigure
          </button>
        </div>
        <div style="margin-top:16px;padding-top:16px;border-top:1px solid #EEF3FB;display:flex;align-items:center;justify-content:space-between">
          <div style="font:500 12px/1 Nunito;color:#7A89A8">Last synced: Today at 1:58 PM</div>
          <button style="padding:8px 16px;border-radius:10px;border:none;background:#FFEEEB;color:#C94E3F;font:600 13px/1 Nunito;cursor:pointer">
            Disconnect
          </button>
        </div>
      </div>

      {{-- Mindy toggle card --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px;display:flex;flex-direction:column;gap:16px">
        {{-- Auto-Reply row --}}
        <div style="display:flex;align-items:center;justify-content:space-between">
          <div>
            <div style="font:700 14px/1 Nunito;color:#0A2E6B">Auto-Reply</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Mindy responds automatically to all incoming messages</div>
          </div>
          {{-- Toggle switch ON --}}
          <div style="flex-shrink:0;width:44px;height:26px;border-radius:13px;background:#00B5AE;position:relative;cursor:pointer;margin-left:12px">
            <span style="position:absolute;top:3px;left:20px;width:20px;height:20px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,.18);transition:left .15s"></span>
          </div>
        </div>
        <div style="height:1px;background:#EEF3FB"></div>
        {{-- Response delay row --}}
        <div style="display:flex;align-items:center;justify-content:space-between">
          <div style="font:500 13px/1 Nunito;color:#4B5C82">Response delay</div>
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">~2 seconds</div>
        </div>
      </div>

    </div>{{-- /account+toggle --}}

    {{-- Inquiry Volume chart --}}
    <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px">
        <div style="font:800 15px/1 Nunito;color:#0A2E6B">Inquiry Volume</div>
        <div style="font:500 12px/1 Nunito;color:#7A89A8">Last 7 days</div>
      </div>
      <div style="font:400 12px/1 Nunito;color:#A8B3C7;margin-bottom:16px">Daily inquiries received via Messenger</div>

      <div style="display:flex;align-items:flex-end;gap:8px;height:120px;padding:0 4px">
        {{-- Mon: 48 → height 52px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:52px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">48</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Mon</div>
        </div>
        {{-- Tue: 72 → height 78px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:78px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">72</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Tue</div>
        </div>
        {{-- Wed: 61 → height 66px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:66px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">61</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Wed</div>
        </div>
        {{-- Thu: 89 → height 97px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:97px;background:#00B5AE;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:700 10px/1 Nunito;color:#00756F">89</span>
            </div>
          </div>
          <div style="font:600 11px/1 Nunito;color:#00B5AE">Thu</div>
        </div>
        {{-- Fri: 77 → height 84px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:84px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">77</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Fri</div>
        </div>
        {{-- Sat: 55 → height 60px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:60px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">55</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Sat</div>
        </div>
        {{-- Sun: 68 → height 74px --}}
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;height:100%">
          <div style="flex:1;display:flex;align-items:flex-end;width:100%">
            <div style="width:100%;height:74px;background:#E8F0FB;border-radius:6px 6px 0 0;position:relative">
              <span style="position:absolute;top:-20px;left:50%;transform:translateX(-50%);font:600 10px/1 Nunito;color:#7A89A8">68</span>
            </div>
          </div>
          <div style="font:500 11px/1 Nunito;color:#A8B3C7">Sun</div>
        </div>
      </div>
    </div>{{-- /chart --}}

    {{-- Bottom 2-col --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">

      {{-- Top Inquiries --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px">
        <div style="font:800 15px/1 Nunito;color:#0A2E6B;margin-bottom:16px">Top Inquiries</div>
        <div style="display:flex;flex-direction:column;gap:12px">

          {{-- Product inquiry 42% --}}
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:8px;border-radius:50%;background:#0A2E6B;flex-shrink:0"></span>
            <div style="font:500 13px/1 Nunito;color:#0A2E6B;width:140px;flex-shrink:0">Product inquiry</div>
            <div style="flex:1;height:6px;border-radius:3px;background:#E8F0FB;overflow:hidden">
              <div style="width:42%;height:100%;background:#0A2E6B;border-radius:3px"></div>
            </div>
            <div style="font:600 12px/1 Nunito;color:#0A2E6B;width:36px;text-align:right;flex-shrink:0">42%</div>
          </div>

          {{-- Location 28% --}}
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:8px;border-radius:50%;background:#4A6AB0;flex-shrink:0"></span>
            <div style="font:500 13px/1 Nunito;color:#4A6AB0;width:140px;flex-shrink:0">Location</div>
            <div style="flex:1;height:6px;border-radius:3px;background:#EEF2FF;overflow:hidden">
              <div style="width:28%;height:100%;background:#4A6AB0;border-radius:3px"></div>
            </div>
            <div style="font:600 12px/1 Nunito;color:#4A6AB0;width:36px;text-align:right;flex-shrink:0">28%</div>
          </div>

          {{-- Promo 15% --}}
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:8px;border-radius:50%;background:#C98A2E;flex-shrink:0"></span>
            <div style="font:500 13px/1 Nunito;color:#C98A2E;width:140px;flex-shrink:0">Promo</div>
            <div style="flex:1;height:6px;border-radius:3px;background:#FFF6E3;overflow:hidden">
              <div style="width:15%;height:100%;background:#C98A2E;border-radius:3px"></div>
            </div>
            <div style="font:600 12px/1 Nunito;color:#C98A2E;width:36px;text-align:right;flex-shrink:0">15%</div>
          </div>

          {{-- Sponsorship 9% --}}
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:8px;border-radius:50%;background:#C94E3F;flex-shrink:0"></span>
            <div style="font:500 13px/1 Nunito;color:#C94E3F;width:140px;flex-shrink:0">Sponsorship</div>
            <div style="flex:1;height:6px;border-radius:3px;background:#FFEEEB;overflow:hidden">
              <div style="width:9%;height:100%;background:#C94E3F;border-radius:3px"></div>
            </div>
            <div style="font:600 12px/1 Nunito;color:#C94E3F;width:36px;text-align:right;flex-shrink:0">9%</div>
          </div>

          {{-- Brand inquiry 6% --}}
          <div style="display:flex;align-items:center;gap:10px">
            <span style="width:8px;height:8px;border-radius:50%;background:#00756F;flex-shrink:0"></span>
            <div style="font:500 13px/1 Nunito;color:#00756F;width:140px;flex-shrink:0">Brand inquiry</div>
            <div style="flex:1;height:6px;border-radius:3px;background:#E0F7F5;overflow:hidden">
              <div style="width:6%;height:100%;background:#00756F;border-radius:3px"></div>
            </div>
            <div style="font:600 12px/1 Nunito;color:#00756F;width:36px;text-align:right;flex-shrink:0">6%</div>
          </div>

        </div>
      </div>{{-- /top inquiries --}}

      {{-- Recent Activity --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px">
        <div style="font:800 15px/1 Nunito;color:#0A2E6B;margin-bottom:16px">Recent Activity</div>
        <div style="display:flex;flex-direction:column;gap:12px">

          {{-- Inquiry resolved --}}
          <div style="display:flex;align-items:flex-start;gap:10px">
            <div style="width:32px;height:32px;border-radius:8px;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <x-icon name="check" :size="14" style="color:#00756F" />
            </div>
            <div style="flex:1;min-width:0">
              <div style="font:600 13px/1 Nunito;color:#0A2E6B">Inquiry resolved</div>
              <div style="font:400 12px/1.3 Nunito;color:#7A89A8;margin-top:2px">Priya Shah · Product inquiry</div>
            </div>
            <div style="font:500 11px/1 Nunito;color:#A8B3C7;white-space:nowrap;flex-shrink:0">2m ago</div>
          </div>

          {{-- Escalation flagged --}}
          <div style="display:flex;align-items:flex-start;gap:10px">
            <div style="width:32px;height:32px;border-radius:8px;background:#FFF6E3;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <x-icon name="alert" :size="14" style="color:#C98A2E" />
            </div>
            <div style="flex:1;min-width:0">
              <div style="font:600 13px/1 Nunito;color:#0A2E6B">Escalation flagged</div>
              <div style="font:400 12px/1.3 Nunito;color:#7A89A8;margin-top:2px">Jules Carter · Refund request</div>
            </div>
            <div style="font:500 11px/1 Nunito;color:#A8B3C7;white-space:nowrap;flex-shrink:0">5m ago</div>
          </div>

          {{-- New conversation --}}
          <div style="display:flex;align-items:flex-start;gap:10px">
            <div style="width:32px;height:32px;border-radius:8px;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <x-icon name="users" :size="14" style="color:#4A6AB0" />
            </div>
            <div style="flex:1;min-width:0">
              <div style="font:600 13px/1 Nunito;color:#0A2E6B">New conversation</div>
              <div style="font:400 12px/1.3 Nunito;color:#7A89A8;margin-top:2px">Eliza Nguyen · Messenger</div>
            </div>
            <div style="font:500 11px/1 Nunito;color:#A8B3C7;white-space:nowrap;flex-shrink:0">8m ago</div>
          </div>

          {{-- Inquiry resolved --}}
          <div style="display:flex;align-items:flex-start;gap:10px">
            <div style="width:32px;height:32px;border-radius:8px;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <x-icon name="check" :size="14" style="color:#00756F" />
            </div>
            <div style="flex:1;min-width:0">
              <div style="font:600 13px/1 Nunito;color:#0A2E6B">Inquiry resolved</div>
              <div style="font:400 12px/1.3 Nunito;color:#7A89A8;margin-top:2px">Marcus Hill · Order confirmation</div>
            </div>
            <div style="font:500 11px/1 Nunito;color:#A8B3C7;white-space:nowrap;flex-shrink:0">15m ago</div>
          </div>

          {{-- High volume alert --}}
          <div style="display:flex;align-items:flex-start;gap:10px">
            <div style="width:32px;height:32px;border-radius:8px;background:#E8F0FB;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <x-icon name="message" :size="14" style="color:#4A6AB0" />
            </div>
            <div style="flex:1;min-width:0">
              <div style="font:600 13px/1 Nunito;color:#0A2E6B">High volume alert</div>
              <div style="font:400 12px/1.3 Nunito;color:#7A89A8;margin-top:2px">18 new inquiries in the last hour</div>
            </div>
            <div style="font:500 11px/1 Nunito;color:#A8B3C7;white-space:nowrap;flex-shrink:0">1h ago</div>
          </div>

        </div>
      </div>{{-- /recent activity --}}

    </div>{{-- /bottom 2-col --}}

  </div>{{-- /.view-content --}}
</div>
@endsection
