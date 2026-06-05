@extends('layouts.app')

@section('title', 'Facebook Connect')
@section('subtitle', 'Manage your Facebook Page and Messenger integration')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div style="padding:28px;display:flex;flex-direction:column;gap:20px">

    {{-- Connection status card --}}
    <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid #EEF3FB">

      {{-- Main connection row --}}
      <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">

        {{-- Facebook logo --}}
        <div style="width:52px;height:52px;border-radius:14px;background:#1877F2;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
          </svg>
        </div>

        {{-- Name + badge --}}
        <div style="flex:1;min-width:0">
          <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
            <div style="font:700 16px/1.2 Nunito;color:#0A2E6B">Optimind PH</div>
            <div style="display:flex;align-items:center;gap:5px;background:#E0F7F5;color:#00756F;font:600 12px/1 Nunito;padding:4px 10px;border-radius:20px">
              <span style="width:7px;height:7px;border-radius:50%;background:#00B5AE;display:inline-block"></span>
              Connected
            </div>
          </div>
          <div style="font:400 13px/1.4 Nunito;color:#7A89A8;margin-top:5px">
            Facebook Page &nbsp;·&nbsp; Page ID: 1209384756 &nbsp;·&nbsp; Last synced 4m ago
          </div>
        </div>

        {{-- Buttons --}}
        <div style="display:flex;align-items:center;gap:10px;flex-shrink:0">
          <button style="padding:9px 18px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;color:#4B5C82;font:600 13px/1 Nunito;cursor:pointer">
            Configure
          </button>
          <button style="padding:9px 18px;border-radius:10px;border:1px solid #FFCDC8;background:#FFEEEB;color:#C94E3F;font:600 13px/1 Nunito;cursor:pointer">
            Disconnect
          </button>
        </div>

      </div>

      {{-- Webhook row --}}
      <div style="margin-top:20px;background:#F4F7FC;border-radius:10px;padding:16px;display:flex;align-items:center;gap:12px">
        <div style="width:36px;height:36px;border-radius:9px;background:#00B5AE1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <x-icon name="bolt" :size="18" :stroke="2" style="color:#00B5AE" />
        </div>
        <div style="flex:1;min-width:0">
          <div style="font:700 13px/1 Nunito;color:#0A2E6B">Webhook active</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
            https://mindy.app/webhook/facebook/1209384756
          </div>
        </div>
        <div style="display:flex;align-items:center;gap:5px;background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px;flex-shrink:0">
          <span style="width:6px;height:6px;border-radius:50%;background:#00B5AE;display:inline-block"></span>
          Healthy
        </div>
      </div>

    </div>{{-- /connection card --}}

    {{-- Messenger Settings card --}}
    <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

      {{-- Card header --}}
      <div style="padding:20px 24px;border-bottom:1px solid #EEF3FB">
        <div style="font:700 15px/1 Nunito;color:#0A2E6B">Messenger Settings</div>
      </div>

      {{-- Row 1: Auto-reply --}}
      <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
        <div>
          <div style="font:600 14px/1 Nunito;color:#0A2E6B">Auto-reply</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Let Mindy respond to incoming messages automatically</div>
        </div>
        <button class="toggle-switch on" id="toggle-autoreply"
          style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#00B5AE;cursor:pointer;flex-shrink:0;transition:background .2s">
          <span class="toggle-dot"
            style="position:absolute;top:2px;left:22px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
        </button>
      </div>

      {{-- Row 2: Typing indicator --}}
      <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
        <div>
          <div style="font:600 14px/1 Nunito;color:#0A2E6B">Typing indicator</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Show typing animation while Mindy is generating a response</div>
        </div>
        <button class="toggle-switch on" id="toggle-typing"
          style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#00B5AE;cursor:pointer;flex-shrink:0;transition:background .2s">
          <span class="toggle-dot"
            style="position:absolute;top:2px;left:22px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
        </button>
      </div>

      {{-- Row 3: Read receipts --}}
      <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
        <div>
          <div style="font:600 14px/1 Nunito;color:#0A2E6B">Read receipts</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Mark messages as seen when Mindy reads them</div>
        </div>
        <button class="toggle-switch" id="toggle-receipts"
          style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#D9E4F5;cursor:pointer;flex-shrink:0;transition:background .2s">
          <span class="toggle-dot"
            style="position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
        </button>
      </div>

      {{-- Row 4: Greeting message (full width) --}}
      <div style="padding:18px 24px">
        <div style="font:600 14px/1 Nunito;color:#0A2E6B">Greeting message</div>
        <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Sent to users the first time they open a conversation with your page</div>
        <textarea
          rows="3"
          style="width:100%;margin-top:12px;border-radius:10px;border:1px solid #E2EAF4;padding:12px 14px;font:400 13px/1.5 Nunito;color:#0A2E6B;resize:vertical;outline:none;box-sizing:border-box;background:#fff"
        >Hi! I'm Mindy, your virtual assistant. How can I help you today?</textarea>
        <div style="display:flex;justify-content:flex-end;margin-top:10px">
          <button style="padding:9px 20px;border-radius:10px;border:none;background:#0A2E6B;color:#fff;font:600 13px/1 Nunito;cursor:pointer">
            Save
          </button>
        </div>
      </div>

    </div>{{-- /messenger settings --}}

    {{-- Page Permissions card --}}
    <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

      {{-- Card header --}}
      <div style="padding:20px 24px;border-bottom:1px solid #EEF3FB">
        <div style="font:700 15px/1 Nunito;color:#0A2E6B">Page Permissions</div>
      </div>

      {{-- pages_messaging --}}
      <div style="display:flex;align-items:center;gap:14px;padding:16px 24px;border-bottom:1px solid #F4F7FC">
        <div style="width:34px;height:34px;border-radius:9px;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <x-icon name="check" :size="16" :stroke="2.5" style="color:#00756F" />
        </div>
        <div style="flex:1;min-width:0">
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">pages_messaging</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Send and receive messages on behalf of your page</div>
        </div>
        <div style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px;flex-shrink:0">Granted</div>
      </div>

      {{-- pages_read_engagement --}}
      <div style="display:flex;align-items:center;gap:14px;padding:16px 24px;border-bottom:1px solid #F4F7FC">
        <div style="width:34px;height:34px;border-radius:9px;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <x-icon name="check" :size="16" :stroke="2.5" style="color:#00756F" />
        </div>
        <div style="flex:1;min-width:0">
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">pages_read_engagement</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Read content posted on your page and engagement data</div>
        </div>
        <div style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px;flex-shrink:0">Granted</div>
      </div>

      {{-- pages_manage_metadata --}}
      <div style="display:flex;align-items:center;gap:14px;padding:16px 24px;border-bottom:1px solid #F4F7FC">
        <div style="width:34px;height:34px;border-radius:9px;background:#E0F7F5;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <x-icon name="check" :size="16" :stroke="2.5" style="color:#00756F" />
        </div>
        <div style="flex:1;min-width:0">
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">pages_manage_metadata</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Subscribe to webhooks for page events and updates</div>
        </div>
        <div style="background:#E0F7F5;color:#00756F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px;flex-shrink:0">Granted</div>
      </div>

      {{-- pages_show_list --}}
      <div style="display:flex;align-items:center;gap:14px;padding:16px 24px">
        <div style="width:34px;height:34px;border-radius:9px;background:#FFEEEB;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C94E3F" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
        </div>
        <div style="flex:1;min-width:0">
          <div style="font:600 13px/1 Nunito;color:#0A2E6B">pages_show_list</div>
          <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:3px">Access the list of Pages you manage</div>
        </div>
        <div style="background:#FFEEEB;color:#C94E3F;font:600 11px/1 Nunito;padding:4px 10px;border-radius:20px;flex-shrink:0">Missing</div>
      </div>

    </div>{{-- /page permissions --}}

  </div>
</div>

<script>
document.querySelectorAll('.toggle-switch').forEach(btn => {
  btn.addEventListener('click', function() {
    this.classList.toggle('on');
    const dot = this.querySelector('.toggle-dot');
    if (dot) {
      dot.style.left = this.classList.contains('on') ? '22px' : '2px';
    }
    this.style.background = this.classList.contains('on') ? '#00B5AE' : '#D9E4F5';
  });
});
</script>
@endsection
