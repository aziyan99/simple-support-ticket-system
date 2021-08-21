<div class="mb-3">
    <label for="customer_id">Customer</label>
    <select name="customer_id" id="customer_id"
            class="form-select @error('customer_id') is-invalid @enderror">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ (old('customer_id') == $customer->id) ? 'selected' : '' }}
                {{ ($ticket->customer_id == $customer->id) ? 'selected' : '' }}>{{ $customer->name }}</option>
        @endforeach
    </select>
    @error('customer_id')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="agent_id">Agent</label>
    <select name="agent_id" id="agent_id"
            class="form-select @error('agent_id') is-invalid @enderror">
        @foreach($agents as $agent)
            <option value="{{ $agent->id }}"
                {{ (old('agent_id') == $agent->id) ? 'selected' : '' }}
                {{ ($ticket->agent_id == $agent->id) ? 'selected' : '' }}>{{ $agent->name }}</option>
        @endforeach
    </select>
    @error('agent_id')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="subject">Subject</label>
    <input type="text" name="subject" id="subject"
           class="form-control @error('subject') is-invalid @enderror"
           value="{{ old('subject', $ticket->subject) }}" autofocus>
    @error('subject')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="5"
              class="form-control @error('content') is-invalid @enderror">{{ old('content', $ticket->content) }}</textarea>
    @error('content')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
