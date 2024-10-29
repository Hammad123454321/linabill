<!-- Fullscreen Modal -->
<div class="modal fade" id="add_lens_modal" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullscreenModalLabel">Add Lens</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <form action="{{ route('add_to_cart') }}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="add-frame-left">
                            <div class="frame-image">
                                <img src="https://cdn.vooglam.com/media/catalog/product/0/1/01_349.jpg" alt="vooglam Glasses" class="default_img">
                            </div>
                            <div class="between">
                                <span>Judith (Red)</span>
                            </div>
                            <div class="between bold-box">
                                <span class="bold">Frame</span>
                                {{-- <span class="original-price notranslate num">$24.99</span> --}}
                                <span class="price notranslate num" id="frame_price">$
                                    <span>
                                        @if ($products->pro_discount)
                                            {{ number_format($products->pro_discount) }}
                                        @else
                                            {{ number_format($products->pro_price) }}
                                        @endif
                                    </span>
                                </span>
                            </div>
                            {{-- @dd($sku_id) --}}
                            

                            <div class="between bold-box">
                                <span class="bold">Lens</span>
                                <span class="price notranslate num">$<span id="lens_price">0.00</span></span>
                            </div>

                            <div class="between bold-box">
                                <span class="bold">Coating</span>
                                <span class="price notranslate num">$<span id="coating_price">0.00</span></span>
                            </div>

                            <input type="hidden" name="pro_id" class="form-control" value="{{ $products->id }}">
                            <input type="hidden" name="sku_id" class="form-control" value="{{ $pro_sku->id }}">
                            <input type="hidden" name="lens_price" id="lens_price_input" class="form-control">
                            <input type="hidden" name="coating_price" id="coating_price_input" class="form-control">
                            
                            <p class="between sub-price">
                                <span>Total</span>
                                <span class="notranslate num">
                                    $<span id="total_price">
                                    @if ($products->pro_discount)
                                        {{ number_format($products->pro_discount) }}
                                    @else
                                        {{ number_format($products->pro_price) }}
                                    @endif</span>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8" style="background-color: #f5f7f9; height: 100%">
                        
                            <!-- Step 1 -->
                            <div class="lens_step active">
                                <div class="add-frame-right mb-16">
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container">
                                                <p class="title">Select a Prescription Type</p>
                                                <ul class="list">
                                                    <li class="item">
                                                        <div class="content-box sel">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/single-vision.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Single Vision </p>
                                                                        <p class="list-desc">Distance, intermediate, or near vision</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/progressive.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Progressive </p>
                                                                        <p class="list-desc">No-line multifocal lenses for both far, middle or near </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/bifocal.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Bifocal </p>
                                                                        <p class="list-desc">Lenses with visible line for both far and near</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/reading-glasses.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Reading Glasses </p>
                                                                        <p class="list-desc">One magnification field for reading</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://common.xmslol.com/vooglam/custom-glasses/pres-type/non-prescription.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Non-Prescription </p>
                                                                        <p class="list-desc">Lenses without vision correction</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lens_step">
                                <div class="add-frame-right mb-16">
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container">
                                                <p class="title">Enter your prescription </p>
                                                <div class="box p-48" style="background-color: white">
                                                    <div class="prescription-container">
                                                        <div class="info-box">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="text-center">SPH</th>
                                                                        <th class="text-center">CYL</th>
                                                                        <th class="text-center">AXIS</th>
                                                                        <th class="text-center">ADD</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>OD-Right</td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>OS-Left</td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>PD</td>
                                                                        <td class="text-center px-24">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">0.00</option>
                                                                            </select>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
        
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="lens_step">
                                <div class="add-frame-right mb-16">
                                    {{-- <div class="top">
                                        <i class="iconfont icon-fanhui"></i>
                                        <div class="progress">
                                            <div class="step-progress-wrap len-2">
                                                <ul>
                                                    <li class="status-2">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Lenses</p>
                                                    </li>
                                                    <li class="status-0">
                                                        <i class="iconfont icon-checked"></i>
                                                        <span></span>
                                                        <p>Coating</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="middle" id="fo-container">
                                        <div class="__view">
                                            <div class="lens-type-container">
                                                <p class="title">Select a lens type</p>
                                                <ul class="list">
                                                    <li class="item">
                                                        <div class="content-box sel">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" data-src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png" src="https://cdn.vooglam.com/product/f135996ce40be9a66056db86eb0d4f91.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Frame Only </p>
                                                                        <p class="list-desc">Plastic Lenses</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$0.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/1d676f74e60d4ad07b7f25dc526bb930.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Standard Lenses </p>
                                                                        <p class="list-desc">Traditional, transparent lenses perfect for everyday use</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$5.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/4dace1b912a6d72d5561c44a4529841c.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Blue Light Blocking </p>
                                                                        <p class="list-desc">Protect your eyes from the negative side effects of digital screens</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$20.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/353080318fa55764bfddb47fbe810bd2.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Transitions®&amp;Photochromic </p>
                                                                        <p class="list-desc">Automatically adapt to changing light, dark outdoors and clear indoors.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="children d-none">
                                                            <div class="child-item">
                                                                <div class="child-item-content">
                                                                    <img src="https://cdn.vooglam.com/product/fbeb23b446b098c9e0e34fffafc9a89f.png" class="child-left" alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">Standard Photochromic <i class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                        </p>
                                                                        <p class="child-desc list-desc">Light-adjusting, block 100%UV. Adapt seamlessly to dynamic needs with versatile photochromic lenses.</p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$35.00</p>
                                                                    </div>
                                                                </div>
                                                                <section>
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img  src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/product/a853dc5c3f18267854e1bdc05606004b.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/df2f3718635fac931b4c0ef954259198.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/product/928af425863e04ca7d89c92046fd876e.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div class="child-item">
                                                                <div class="child-item-content">
                                                                    <img src="https://cdn.vooglam.com/product/c846aca2a471d16f37fc4998deacf4a1.png" class="child-left" alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">TRANSITIONS® SIGNATURE® GEN8™ <i class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger"></i>
                                                                        </p>
                                                                        <p class="child-desc list-desc">The perfect everyday lens. Available in 5 different vibrant colors.</p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$100.00</p>
                                                                    </div>
                                                                </div>
                                                                <section>
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/0391509b7887fec026ccae5bc7a09cd0.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/8a0c4d276441463d6af96c5ffd435a8c.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/d949ff03e4a0ee0af306a918c5d02026.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div class="child-item">
                                                                <div class="child-item-content">
                                                                    <img src="https://cdn.vooglam.com/product/5b8c4c1d7581da4c148500d77a01ec11.png" class="child-left" alt="vooglam eyewear prescription form">
                                                                    <div class="child-center">
                                                                        <p class="child-name list-title">TRANSITIONS® XTRACTIVE® New Generation <i data-v-134834db="" class="iconfont icon-querstion4 el-tooltip__trigger el-tooltip__trigger" style="display: none;"></i></p>
                                                                        <p class="child-desc list-desc">The darkest in hot temperatures, providing up to 35% faster fadeback, activates even in the car.</p>
                                                                    </div>
                                                                    <div class="price child-price">
                                                                        <p class="notranslate">$130.00</p>
                                                                    </div>
                                                                </div>
                                                                <section>
                                                                    <div class="color-container level2">
                                                                        <span>Color</span>
                                                                        <ul>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/944acbb8b0546dca31cb42cf66310ebc.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                            <li>
                                                                                <img src="https://cdn.vooglam.com/lens-setting/1552fa3d0bf8a6602b220c63ace06ff4.png" alt="vooglam" class="el-tooltip__trigger">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/21328d74ac2fd3c7644c075f36ca9dde.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Color Tint </p>
                                                                        <p class="list-desc">Tint or coat your lenses and turn regular lenses into sunglasses</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                            <section class="d-none">
                                                                <div class="color-container level1">
                                                                    <span>Color</span>
                                                                    <ul>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/80dee2ca89f1eef0ea85c1bf09a8c731.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/49357be06c7a2e47cccb6d411aa67d0d.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/e69f5c58dc64678aa2ec01bb2562b436.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/19f71e2565a20bb32cab56be22433b39.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/06fd511062cce769e7c0a14fd55859a4.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/aa3697996379891c9c6cbaef72638f90.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/42f78ce7119de5249bce6e113a927bc5.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/821b8378c36ac20ecb5d6336c6aae86a.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/f14309c6ac0dfbc6e7db678d0534b33b.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Driving Lenses </p>
                                                                        <p class="list-desc">Safer driving day and night; UV blocking</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="content-box">
                                                            <div class="content">
                                                                <div class="left">
                                                                    <img alt="vooglam eyewear prescription form" src="https://cdn.vooglam.com/product/546ea655396994809f3a67379e785b7f.png" lazy="loaded">
                                                                    <div>
                                                                        <p class="list-title">Polarized Lenses </p>
                                                                        <p class="list-desc">Reduce extra bright light glares and hazy vision</p>
                                                                    </div>
                                                                </div>
                                                                <div class="price">
                                                                    <p class="notranslate">$35.00</p>
                                                                </div>
                                                            </div>
                                                            <section class="d-none">
                                                                <div class="color-container level1">
                                                                    <span>Color</span>
                                                                    <ul>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/product/73ef115d5fc9ee22d833b146898a9de9.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/lens-setting/300bc485559b7226d5a17b8dd24bf557.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/product/de2ae9a10624aa0368d889df3e477781.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                        <li>
                                                                            <img src="https://cdn.vooglam.com/product/b4a520e6e0e913495de30545ec434a3a.png" alt="vooglam" class="el-tooltip__trigger">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Step 3 -->
                            <div class="lens_step">
                                <div class="coating-container mb-16">
                                    <p class="title"> Select a coating <i class="iconfont icon-querstion4"></i></p>
                                    <ul class="list">
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form" data-src="https://cdn.vooglam.com/product/de2b31b19b481fe309a234256867d057.png" src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png" lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Standard Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Reduces light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$4.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="li-recommend">
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form" data-src="https://cdn.vooglam.com/product/77f79e786be1aff4bf1a2f14eda76ea8.png" src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png" lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Advanced Coatings</p>
                                                            <div class="intro-recommend">Recommended</div>
                                                        </div>
                                                        <p class="intro-desc">Water-resistant, easy to clean reduces light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$8.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content sel">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form" data-src="https://cdn.vooglam.com/product/47aaad525e9b18f2c0fc974aaf892768.png" src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png" lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>Ultimate Coatings</p>
                                                        </div>
                                                        <p class="intro-desc">Oil-Resistant and water-resistant; reduces light reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$9.95</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="intro">
                                                    <img alt="vooglam eyewear prescription form" data-src="https://cdn.vooglam.com/product/ef7bc5b712c5e56e1955da89c9682882.png" src="https://www.vooglam.com/_vooglam/new_img_loading.52e6345b.png" lazy="loading">
                                                    <div>
                                                        <div class="intro-title">
                                                            <p>No Coating</p>
                                                        </div>
                                                        <p class="intro-desc">Not recommended, may result in glare and harsh reflections</p>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <p class="notranslate">$0.00</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
        
                            <div class="modal-footer text-center" style="display: block;">
                                <button type="button" class="btn btn-outline-main bg-main-50" id="lens_prevBtn" disabled>Previous</button>
                                <button type="button" class="btn btn-main" id="lens_nextBtn">Next</button>
                                <button type="submit" class="btn btn-main" id="lens_submitBtn" style="display: none;">Add To Cart</button>
                            </div>
                        
        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>