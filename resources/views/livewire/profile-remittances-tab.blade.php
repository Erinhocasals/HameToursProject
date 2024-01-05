<div>
    @hasanyrole('bank|messenger')
        <li class="nav-item">
            <a href="#remittances" data-bs-toggle="tab" class="nav-link relative">Remesas
                <span class="badge text-yellow-600 light badge-light absolute top-0 ml-1 text-xs">{{ $count }}</span>
            </a>
        </li>
    @endhasanyrole
</div>
