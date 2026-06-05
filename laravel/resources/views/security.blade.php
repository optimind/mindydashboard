@extends('layouts.app')

@section('title', 'Change Password')
@section('subtitle', 'Keep your account secure with a strong password')

@section('content')
<div style="flex:1;overflow:auto;background:#F4F7FC;min-height:0">
  <div style="padding:28px;display:flex;flex-direction:column;gap:20px">

    {{-- 2-column grid --}}
    <div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start">

      {{-- LEFT: Password form card --}}
      <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:28px">

        <div style="font:700 16px/1.2 Nunito;color:#0A2E6B;margin-bottom:22px">Update password</div>

        {{-- Current password --}}
        <div style="margin-bottom:18px">
          <label style="display:block;font:600 13px/1 Nunito;color:#0A2E6B;margin-bottom:7px">Current password</label>
          <div class="pw-field" style="position:relative">
            <input
              id="current-password"
              type="password"
              autocomplete="current-password"
              style="width:100%;height:42px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 44px 0 14px;font:400 14px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box"
            />
            <button type="button" class="pw-toggle"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);border:none;background:transparent;cursor:pointer;color:#A8B3C7;display:flex;align-items:center;padding:0">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        {{-- New password --}}
        <div style="margin-bottom:8px">
          <label style="display:block;font:600 13px/1 Nunito;color:#0A2E6B;margin-bottom:7px">New password</label>
          <div class="pw-field" style="position:relative">
            <input
              id="new-password"
              type="password"
              autocomplete="new-password"
              style="width:100%;height:42px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 44px 0 14px;font:400 14px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box"
            />
            <button type="button" class="pw-toggle"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);border:none;background:transparent;cursor:pointer;color:#A8B3C7;display:flex;align-items:center;padding:0">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        {{-- Strength bar --}}
        <div style="margin-bottom:18px">
          <div style="display:flex;gap:4px;margin-bottom:5px">
            <div class="strength-seg" style="flex:1;height:4px;border-radius:2px;background:#E2EAF4;transition:background .2s"></div>
            <div class="strength-seg" style="flex:1;height:4px;border-radius:2px;background:#E2EAF4;transition:background .2s"></div>
            <div class="strength-seg" style="flex:1;height:4px;border-radius:2px;background:#E2EAF4;transition:background .2s"></div>
            <div class="strength-seg" style="flex:1;height:4px;border-radius:2px;background:#E2EAF4;transition:background .2s"></div>
            <div class="strength-seg" style="flex:1;height:4px;border-radius:2px;background:#E2EAF4;transition:background .2s"></div>
          </div>
          <div id="strength-label" style="font:500 11px/1 Nunito;color:#A8B3C7;height:14px"></div>
        </div>

        {{-- Confirm new password --}}
        <div style="margin-bottom:8px">
          <label style="display:block;font:600 13px/1 Nunito;color:#0A2E6B;margin-bottom:7px">Confirm new password</label>
          <div class="pw-field" style="position:relative">
            <input
              id="confirm-password"
              type="password"
              autocomplete="new-password"
              style="width:100%;height:42px;border-radius:10px;border:1px solid #E2EAF4;background:#fff;padding:0 44px 0 14px;font:400 14px/1 Nunito;color:#0A2E6B;outline:none;box-sizing:border-box"
            />
            <button type="button" class="pw-toggle"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);border:none;background:transparent;cursor:pointer;color:#A8B3C7;display:flex;align-items:center;padding:0">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>
        <div id="match-msg" style="font:500 12px/1 Nunito;height:16px;margin-bottom:18px"></div>

        {{-- Password tips --}}
        <div style="background:#F4F7FC;border-radius:10px;padding:12px 14px;margin-bottom:22px">
          <div style="font:600 12px/1 Nunito;color:#4B5C82;margin-bottom:8px">Password requirements</div>
          <ul style="margin:0;padding:0 0 0 16px;display:flex;flex-direction:column;gap:5px">
            <li style="font:400 12px/1.4 Nunito;color:#7A89A8">Minimum 8 characters</li>
            <li style="font:400 12px/1.4 Nunito;color:#7A89A8">At least one uppercase letter</li>
            <li style="font:400 12px/1.4 Nunito;color:#7A89A8">At least one number</li>
            <li style="font:400 12px/1.4 Nunito;color:#7A89A8">At least one special character</li>
          </ul>
        </div>

        {{-- Footer button --}}
        <div style="display:flex;justify-content:flex-end">
          <button
            id="save-pw-btn"
            style="padding:10px 24px;border-radius:10px;border:none;background:#D9E4F5;color:#A8B3C7;font:600 14px/1 Nunito;cursor:pointer;transition:background .2s,color .2s"
          >
            Save changes
          </button>
        </div>

      </div>{{-- /form card --}}

      {{-- RIGHT: Info panels --}}
      <div style="display:flex;flex-direction:column;gap:16px">

        {{-- Account card --}}
        <div style="background:#fff;border-radius:16px;border:1px solid #EEF3FB;padding:20px">
          <div style="font:700 14px/1 Nunito;color:#0A2E6B;margin-bottom:16px">Account</div>

          {{-- Email --}}
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:10px 0;border-bottom:1px solid #F4F7FC">
            <div style="font:400 13px/1 Nunito;color:#7A89A8">Email</div>
            <div style="font:600 13px/1 Nunito;color:#0A2E6B;text-align:right">wsang@myoptimind.com</div>
          </div>

          {{-- Last password change --}}
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:10px 0;border-bottom:1px solid #F4F7FC">
            <div style="font:400 13px/1 Nunito;color:#7A89A8">Last password change</div>
            <div style="font:600 13px/1 Nunito;color:#0A2E6B;text-align:right">90 days ago</div>
          </div>

          {{-- Account created --}}
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:10px 0">
            <div style="font:400 13px/1 Nunito;color:#7A89A8">Account created</div>
            <div style="font:600 13px/1 Nunito;color:#0A2E6B;text-align:right">March 3, 2026</div>
          </div>

        </div>

        {{-- Tips card --}}
        <div style="background:#E8F0FB;border-radius:16px;padding:20px">

          {{-- Header --}}
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px">
            <div style="width:34px;height:34px;border-radius:9px;background:#0A2E6B1A;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0A2E6B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              </svg>
            </div>
            <div style="font:700 14px/1 Nunito;color:#0A2E6B">Tips for a strong password</div>
          </div>

          {{-- Tips list --}}
          <div style="display:flex;flex-direction:column;gap:10px">

            <div style="display:flex;align-items:flex-start;gap:10px">
              <div style="width:20px;height:20px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 10px/1 Nunito;color:#fff">1</div>
              <div style="font:400 12px/1.5 Nunito;color:#4B5C82">At least 12 characters long</div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:10px">
              <div style="width:20px;height:20px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 10px/1 Nunito;color:#fff">2</div>
              <div style="font:400 12px/1.5 Nunito;color:#4B5C82">Mix uppercase and lowercase letters</div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:10px">
              <div style="width:20px;height:20px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 10px/1 Nunito;color:#fff">3</div>
              <div style="font:400 12px/1.5 Nunito;color:#4B5C82">Include numbers and symbols</div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:10px">
              <div style="width:20px;height:20px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 10px/1 Nunito;color:#fff">4</div>
              <div style="font:400 12px/1.5 Nunito;color:#4B5C82">Avoid names, birthdays, or common words</div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:10px">
              <div style="width:20px;height:20px;border-radius:50%;background:#0A2E6B;display:flex;align-items:center;justify-content:center;flex-shrink:0;font:700 10px/1 Nunito;color:#fff">5</div>
              <div style="font:400 12px/1.5 Nunito;color:#4B5C82">Use a unique password for this account</div>
            </div>

          </div>
        </div>{{-- /tips card --}}

      </div>{{-- /right column --}}

    </div>{{-- /2-column grid --}}

  </div>
</div>

<script>
// Password visibility toggles
document.querySelectorAll('.pw-toggle').forEach(btn => {
  btn.addEventListener('click', function() {
    const input = this.closest('.pw-field').querySelector('input');
    const isText = input.type === 'text';
    input.type = isText ? 'password' : 'text';
    this.innerHTML = isText
      ? '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>'
      : '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
  });
});
// Strength check
document.getElementById('new-password').addEventListener('input', function() {
  const pw = this.value;
  let score = 0;
  if (pw.length >= 8) score++;
  if (pw.length >= 12) score++;
  if (/[A-Z]/.test(pw)) score++;
  if (/[0-9]/.test(pw)) score++;
  if (/[^A-Za-z0-9]/.test(pw)) score++;
  const colors = ['#F27262','#F27262','#F5B44F','#F5B44F','#00B5AE','#00756F'];
  const labels = ['Too short','Weak','Fair','Good','Strong','Very strong'];
  document.querySelectorAll('.strength-seg').forEach((seg, i) => {
    seg.style.background = i < score ? colors[score] : '#E2EAF4';
  });
  const lbl = document.getElementById('strength-label');
  if (lbl) { lbl.textContent = pw ? labels[score] : ''; lbl.style.color = colors[score]; }
  // Update save button style
  const btn = document.getElementById('save-pw-btn');
  const cp = document.getElementById('confirm-password').value;
  const enabled = pw.length >= 8 && pw === cp;
  btn.style.background = enabled ? '#0A2E6B' : '#D9E4F5';
  btn.style.color = enabled ? '#fff' : '#A8B3C7';
});
// Match check
function checkMatch() {
  const np = document.getElementById('new-password').value;
  const cp = document.getElementById('confirm-password').value;
  const msg = document.getElementById('match-msg');
  if (!msg) return;
  if (!cp) { msg.textContent = ''; return; }
  if (np === cp) { msg.textContent = '✓ Passwords match'; msg.style.color = '#00756F'; }
  else { msg.textContent = '✗ Passwords don\'t match'; msg.style.color = '#C94E3F'; }
  // Update save button style
  const btn = document.getElementById('save-pw-btn');
  const enabled = np.length >= 8 && np === cp;
  btn.style.background = enabled ? '#0A2E6B' : '#D9E4F5';
  btn.style.color = enabled ? '#fff' : '#A8B3C7';
}
document.getElementById('new-password').addEventListener('input', checkMatch);
document.getElementById('confirm-password').addEventListener('input', checkMatch);
</script>
@endsection
