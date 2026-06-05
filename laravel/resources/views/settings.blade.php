@extends('layouts.app')

@section('title', 'Settings')
@section('subtitle', 'Workspace and chatbot preferences')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div style="padding:28px;display:flex;flex-direction:column;gap:20px">
    <div style="max-width:820px;width:100%;display:flex;flex-direction:column;gap:20px">

      {{-- Page header --}}
      <div style="display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap">
        <div>
          <div style="font:800 22px/1.1 Nunito;color:#0A2E6B;letter-spacing:-0.02em">Settings</div>
          <div style="font:400 13px/1.4 Nunito;color:#4B5C82;margin-top:4px">Workspace and chatbot preferences</div>
        </div>
        <div style="display:flex;align-items:center;gap:12px">
          <span id="saved-msg" style="display:none;align-items:center;gap:6px;font:600 13px/1 Nunito;color:#00756F">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            Saved ✓
          </span>
          <button id="save-btn"
            style="padding:9px 20px;border-radius:10px;border:none;background:#0A2E6B;color:#fff;font:600 13px/1 Nunito;cursor:pointer">
            Save changes
          </button>
        </div>
      </div>

      {{-- General section --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

        {{-- Section header --}}
        <div style="padding:18px 24px;border-bottom:1px solid #EEF3FB">
          <div style="font:700 15px/1 Nunito;color:#0A2E6B">General</div>
          <div style="font:400 12px/1 Nunito;color:#7A89A8;margin-top:4px">Basic workspace information</div>
        </div>

        {{-- Workspace name --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Workspace name</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">The display name for your workspace</div>
          </div>
          <input
            type="text"
            value="Optimind PH"
            style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box;flex-shrink:0"
          />
        </div>

        {{-- Timezone --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Timezone</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Used for scheduling and reports</div>
          </div>
          <select style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;cursor:pointer;flex-shrink:0">
            <option>Asia/Manila (GMT+8)</option>
            <option>Asia/Singapore (GMT+8)</option>
            <option>America/New_York (GMT-5)</option>
            <option>UTC</option>
          </select>
        </div>

        {{-- Language --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Language</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Interface and response language</div>
          </div>
          <select style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;cursor:pointer;flex-shrink:0">
            <option>English</option>
            <option>Filipino</option>
            <option>Spanish</option>
          </select>
        </div>

      </div>{{-- /general section --}}

      {{-- Chatbot Behavior section --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

        {{-- Section header --}}
        <div style="padding:18px 24px;border-bottom:1px solid #EEF3FB">
          <div style="font:700 15px/1 Nunito;color:#0A2E6B">Chatbot Behavior</div>
          <div style="font:400 12px/1 Nunito;color:#7A89A8;margin-top:4px">Control how Mindy interacts with customers</div>
        </div>

        {{-- Chatbot name --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Chatbot name</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">The name customers see when chatting</div>
          </div>
          <input
            type="text"
            value="Mindy"
            style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box;flex-shrink:0"
          />
        </div>

        {{-- Personality --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Personality</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Tone and style of Mindy's responses</div>
          </div>
          <select style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;cursor:pointer;flex-shrink:0">
            <option>Friendly &amp; casual</option>
            <option>Professional &amp; formal</option>
            <option>Concise &amp; direct</option>
          </select>
        </div>

        {{-- Auto-reply toggle --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Auto-reply</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Automatically respond to incoming messages</div>
          </div>
          <button class="toggle-switch on"
            style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#00B5AE;cursor:pointer;flex-shrink:0;transition:background .2s">
            <span class="toggle-dot"
              style="position:absolute;top:2px;left:22px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
          </button>
        </div>

        {{-- Response delay --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Response delay</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">How quickly Mindy replies after a message is received</div>
          </div>
          <select style="width:220px;height:38px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 12px;font:500 13px/1 Nunito;color:#0A2E6B;outline:none;cursor:pointer;flex-shrink:0">
            <option>Instant</option>
            <option>~1 second</option>
            <option>~2 seconds</option>
            <option>~3 seconds</option>
          </select>
        </div>

      </div>{{-- /chatbot behavior --}}

      {{-- Notifications section --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;overflow:hidden">

        {{-- Section header --}}
        <div style="padding:18px 24px;border-bottom:1px solid #EEF3FB">
          <div style="font:700 15px/1 Nunito;color:#0A2E6B">Notifications</div>
          <div style="font:400 12px/1 Nunito;color:#7A89A8;margin-top:4px">Choose when to receive alerts</div>
        </div>

        {{-- Email alerts --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Email alerts</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Receive email for important events</div>
          </div>
          <button class="toggle-switch on"
            style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#00B5AE;cursor:pointer;flex-shrink:0;transition:background .2s">
            <span class="toggle-dot"
              style="position:absolute;top:2px;left:22px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
          </button>
        </div>

        {{-- Escalation alerts --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #F4F7FC">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Escalation alerts</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Notify immediately when a conversation is escalated</div>
          </div>
          <button class="toggle-switch on"
            style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#00B5AE;cursor:pointer;flex-shrink:0;transition:background .2s">
            <span class="toggle-dot"
              style="position:absolute;top:2px;left:22px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
          </button>
        </div>

        {{-- Weekly performance report --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Weekly performance report</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Summary of conversations, resolutions, and trends</div>
          </div>
          <button class="toggle-switch"
            style="position:relative;width:44px;height:24px;border-radius:12px;border:none;background:#D9E4F5;cursor:pointer;flex-shrink:0;transition:background .2s">
            <span class="toggle-dot"
              style="position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;transition:left .2s;display:block"></span>
          </button>
        </div>

      </div>{{-- /notifications --}}

      {{-- Danger Zone section --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #FFEEEB;overflow:hidden">

        {{-- Section header --}}
        <div style="padding:18px 24px;border-bottom:1px solid #FFEEEB">
          <div style="font:700 15px/1 Nunito;color:#C94E3F">Danger Zone</div>
          <div style="font:400 12px/1 Nunito;color:#7A89A8;margin-top:4px">Irreversible actions — proceed with caution</div>
        </div>

        {{-- Reset chatbot data --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px;border-bottom:1px solid #FFEEEB">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Reset chatbot data</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Clears all conversation history and learned data</div>
          </div>
          <button style="padding:8px 16px;border-radius:10px;border:1px solid #F27262;background:#fff;color:#C94E3F;font:600 13px/1 Nunito;cursor:pointer;flex-shrink:0;white-space:nowrap">
            Reset data
          </button>
        </div>

        {{-- Delete workspace --}}
        <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;padding:18px 24px">
          <div style="min-width:0">
            <div style="font:600 13px/1 Nunito;color:#0A2E6B">Delete workspace</div>
            <div style="font:400 12px/1.4 Nunito;color:#7A89A8;margin-top:4px">Permanently deletes this workspace and all associated data</div>
          </div>
          <button style="padding:8px 16px;border-radius:10px;border:1px solid #F27262;background:#fff;color:#C94E3F;font:600 13px/1 Nunito;cursor:pointer;flex-shrink:0;white-space:nowrap">
            Delete workspace
          </button>
        </div>

      </div>{{-- /danger zone --}}

    </div>
  </div>
</div>

<script>
document.querySelectorAll('.toggle-switch').forEach(btn => {
  btn.addEventListener('click', function() {
    this.classList.toggle('on');
    const dot = this.querySelector('.toggle-dot');
    if (dot) dot.style.left = this.classList.contains('on') ? '22px' : '2px';
    this.style.background = this.classList.contains('on') ? '#00B5AE' : '#D9E4F5';
  });
});
document.getElementById('save-btn').addEventListener('click', function() {
  const msg = document.getElementById('saved-msg');
  msg.style.display = 'flex';
  setTimeout(() => msg.style.display = 'none', 2500);
});
</script>
@endsection
