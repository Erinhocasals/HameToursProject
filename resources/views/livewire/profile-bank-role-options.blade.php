<div>
    @hasrole('bank')
        <x-jet-form-section submit="tx">
            <x-slot name="title">
                {{ __('Options Role') }}
            </x-slot>

            <x-slot name="description">
                {!! $role->content !!}

                <div class="owl-item active mt-5" style="width: auto; ">
                    <div class="items">

                        @foreach (auth()->user()->balance() as $balance)
                            <div class="card-bx stacked card">
                                <img src="{{ asset('admin-template/images/card/card22.jpg') }}" alt="card">
                                <div class="card-info">
                                    <p class="mb-1 text-white fs-14">Balance</p>
                                    <div class="d-flex justify-content-between">
                                        <h2 class="num-text text-white font-w600">
                                            {{ $balance['value'] }} <br/>
                                            <span class="text-sm">{{ $balance['currency_string'] }}</span>
                                        </h2>
                                        <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                                            <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 lg:col-span-6 form-wrapper">
                    <x-jet-input-error for="role" class="mt-2" />

                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ __('Deposit') }}</span>
                            </div>
                            <input id="amount" type="number" name="amount" class="form-control" wire:model="amount" placeholder="0" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">Moneda</label>
                        <select name="currency" class="default-select form-control wide mb-3" id="currency" wire:model="currency">
                            <option value="USD">USD (EFECTIVO)</option>
                            <option value="EUR">EUR (EFECTIVO)</option>
                            <option value="CUP">CUP (EFECTIVO)</option>
                            <option value="CUP_TX">CUP (TRANSFERENCIA)</option>
                            <option value="MLC">MLC (TRANSFERENCIA)</option>
                            <option value="CRIPTO">CRIPTO (TRANSFERENCIA)</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="table-responsive" style="max-height: 500px">
                            <table class="table border-hover tr-rounded card-table cardtbl-link display" id="transactions">
                                <tbody>
                                    @foreach ($transactions as $tx)
                                        <tr>
                                            <td>
                                                <span>
                                                    @if ($tx->type == 'in')
                                                        <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scale(0.5)">
                                                            <rect width="63" height="63" rx="31.5" fill="#13B440"></rect>
                                                            <path d="M40.6186 32.7207L40.6186 32.7207L40.6353 39.6289C40.6354 39.6328 40.6354 39.6363 40.6353 39.6396M40.6186 32.7207L40.1353 39.6341L40.6353 39.635C40.6353 39.6481 40.6347 39.6583 40.6345 39.6627L40.6344 39.6642C40.6346 39.6609 40.6351 39.652 40.6353 39.6407C40.6353 39.6403 40.6353 39.64 40.6353 39.6396M40.6186 32.7207C40.6167 31.9268 39.9717 31.2847 39.1777 31.2866C38.3838 31.2885 37.7417 31.9336 37.7436 32.7275L37.7436 32.7275L37.7519 36.1563M40.6186 32.7207L37.7519 36.1563M40.6353 39.6396C40.6329 40.4282 39.9931 41.0705 39.2017 41.0726C39.2 41.0726 39.1983 41.0727 39.1965 41.0727L39.1944 41.0727L39.1773 41.0726L32.2834 41.056L32.2846 40.556L32.2834 41.056C31.4897 41.054 30.8474 40.4091 30.8494 39.615C30.8513 38.8211 31.4964 38.179 32.2903 38.1809L32.2903 38.1809L35.719 38.1892L22.5364 25.0066C21.975 24.4452 21.975 23.5351 22.5364 22.9737C23.0978 22.4123 24.0079 22.4123 24.5693 22.9737L37.7519 36.1563M40.6353 39.6396C40.6353 39.6376 40.6353 39.6356 40.6353 39.6336L37.7519 36.1563M39.1964 41.0726C39.1957 41.0726 39.1951 41.0726 39.1944 41.0726L39.1964 41.0726Z" fill="white" stroke="white"></path>
                                                        </svg>
                                                    @else
                                                        <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scale(0.5)">
                                                            <rect width="63" height="63" rx="31.5" fill="#F04444"></rect>
                                                            <path d="M22.1318 30.9043L22.1318 30.9043L22.1151 23.9961C22.1151 23.9922 22.1151 23.9887 22.1152 23.9854M22.1318 30.9043L22.6152 23.9909L22.1152 23.9901C22.1152 23.9769 22.1157 23.9667 22.116 23.9623L22.1161 23.9608C22.1159 23.9641 22.1154 23.973 22.1152 23.9843C22.1152 23.9847 22.1152 23.9851 22.1152 23.9854M22.1318 30.9043C22.1338 31.6982 22.7788 32.3403 23.5728 32.3384C24.3667 32.3365 25.0088 31.6914 25.0069 30.8975L25.0069 30.8975L24.9986 27.4687M22.1318 30.9043L24.9986 27.4687M22.1152 23.9854C22.1176 23.1968 22.7574 22.5545 23.5488 22.5524C23.5504 22.5524 23.5522 22.5524 23.554 22.5524L23.5561 22.5523L23.5732 22.5524L30.4671 22.5691L30.4658 23.0691L30.4671 22.5691C31.2608 22.571 31.903 23.2159 31.9011 24.01C31.8992 24.8039 31.2541 25.446 30.4602 25.4441L30.4602 25.4441L27.0315 25.4358L40.2141 38.6184C40.7755 39.1798 40.7755 40.09 40.2141 40.6513C39.6527 41.2127 38.7426 41.2127 38.1812 40.6513L24.9986 27.4687M22.1152 23.9854C22.1152 23.9874 22.1152 23.9894 22.1152 23.9914L24.9986 27.4687M23.5541 22.5524C23.5547 22.5524 23.5554 22.5524 23.5561 22.5524L23.5541 22.5524Z" fill="white" stroke="white"></path>
                                                        </svg>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="wspace-no">
                                                <span class="font-w600 text-black">@if ($tx->type == 'in') Depósito @else Extracción @endif </span>
                                            </td>
                                            <td>
                                                <span class="text-black">{{ $tx->created_at }}</span>
                                            </td>
                                            <td>
                                                <span class="font-w600 text-black">@if ($tx->type == 'in') + @else - @endif {{ $tx->amount }} {{ $tx->currencyToString() }}</span>
                                            </td>
                                            {{-- <td><a class="btn btn-outline-success float-end rounded" href="javascript:void(0);">Completed</a></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center">
                        <div class="col-lg-6">
                            <div>
                                {{-- <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-end">
                                <x-jet-action-message class="mr-3" on="saved">
                                    {{ __('Saved.') }}
                                </x-jet-action-message>
                                <button type="button" class="btn  btn-success text-white rounded" wire:click="tx('in')">
                                    {{ __('Deposit') }}
                                    <svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-danger ms-3 rounded" wire:click="tx('out')">
                                    {{ __('Withdraw') }}
                                    <svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </x-slot>
        </x-jet-form-section>
    @endhasrole
</div>
