<div class="row">
    <div class="col-md-6">
        @can('isAdmin')
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
        @endcan

        @can('isCustomer')
            <input type="hidden" name="customer_id" class="form-control" value="{{ $customerId }}" readonly>
            <input type="hidden" name="agent_id" class="form-control" value="{{ $agentId }}" readonly>
            <div class="mb-3">
                <label>Customer</label>
                <input type="text" class="form-control" value="{{ $customerName }}" readonly>
            </div>
            <div class="mb-3">
                <label>Agent</label>
                <input type="text" class="form-control" value="{{ $agentName }}" readonly>
            </div>
        @endcan

        @can('isAgent')
            <input type="hidden" name="customer_id" class="form-control" value="{{ $customerId }}" readonly>
            <div class="mb-3">
                <label>Agent</label>
                <input type="text" class="form-control" value="{{ $agentName }}" readonly>
            </div>
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
        @endcan

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('category_id') == $category->id) ? 'selected' : '' }}
                        {{ ($ticket->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
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
    </div>
</div>

