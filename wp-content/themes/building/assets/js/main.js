jQuery(document).ready(function ($) {
    // Variável para paginação
    var page = 1;
    // Abrir/fechar menu mobile
    $(document).on("click", "#icon-mobile, #icon-close", function () {
        $("#nav-mobile").toggleClass("active");
    });
    // Abrir modal busca
    $(document).on("click", "#search-icon-header", function () {
        $("#search-form-header").toggleClass("active");
    });
    // Abrir/fechar campo de busca portfolio
    $(document).on("click", "#search-icon-portfolio", function () {
        $("#search-input-portfolio").toggleClass("active");
        $("#search-input-portfolio").focus();
    });
    // Inputs contato
    $("form p").each(function () {
        if ($(this).find("input").val()) {
            $(this).addClass("active");
        }
    });
    $(document).on("click", "form p", function () {
        $("form p").each(function () {
            if (!$(this).find("input").val()) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        $(this).find("input").focus();
    });

    // Hover blog footer
    $("#blog-footer .post, .recommended-item").hover(
        function () {
            $(this).addClass("active");
            $("#blog-footer .post, .recommended-item")
                .not(this)
                .addClass("not-active");
        },
        function () {
            $("#blog-footer .post, .recommended-item").removeClass(
                "active not-active"
            );
        }
    );
    // Abrir conteúdo completo do post (ler mais)
    $(".ler-mais").on("click", function (e) {
        e.preventDefault();
        $(".btn-ler-mais").addClass("active");
        $(".descricao-completa").slideDown();
        $(this).hide();
    });
    // Abrir slider galeria de imagens
    $(".verGaleria").on("click", function (e) {
        e.preventDefault();
        $("body").addClass("modal-open");
        var itemId = $(this).data("item-id");

        $("#modalGaleria").fadeIn(function () {
            // Se o slider já foi inicializado
            if ($("#slider-galeria").hasClass("slick-initialized")) {
                // Atualizar o slide ativo no slider principal e nos dots
                $("#slider-galeria").slick("slickGoTo", itemId, true);
                $("#slider-galeria-dots").slick("slickGoTo", itemId, true);
            } else {
                // Slider principal
                $("#slider-galeria").slick({
                    initialSlide: itemId,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: "#slider-galeria-dots", // Sincronização com os dots
                });

                // Slider dos dots
                $("#slider-galeria-dots").slick({
                    initialSlide: itemId,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    asNavFor: "#slider-galeria",
                    dots: false,
                    arrows: false,
                    focusOnSelect: true,
                    centerMode: true,
                    variableWidth: true,
                });
            }

            // Recalcular dimensões do slider
            $("#slider-galeria").slick("setPosition");
        });
    });

    // Diferenciais PDP

    $('.slider-diferenciais[data-category="areas-comuns"]').addClass("active");

    $(".category-diferenciais").on("click", function () {
        var categoria = $(this).data("category");

        $(".category-diferenciais").removeClass("active");
        $(this).addClass("active");

        $(".slider-diferenciais[data-category]").removeClass("active");

        $('.slider-diferenciais[data-category="' + categoria + '"]').addClass(
            "active"
        );
    });

    $(".open-modal").on("click", function () {
        $("body").addClass("modal-open");
        var itemId = $(this).data("item-id");
        var categoria = $(this).data("category");

        // Limpa o conteúdo da modal
        $(".modal-slider").empty();

        // Coleta todos os itens da mesma categoria
        var items = [];
        $(
            '.slider-diferenciais[data-category="' +
                categoria +
                '"] .slider-item-template'
        ).each(function () {
            var imagem = $(this).find("img").attr("src");
            var titulo = $(this).find("h3").text();
            var descricao = $(this).find(".descricao").text();

            items.push({
                imagem: imagem,
                titulo: titulo,
                descricao: descricao,
            });
        });

        // Cria o slider dentro da modal com os itens da categoria
        $.each(items, function (index, item) {
            var activeClass = index === itemId - 1 ? "slick-current" : ""; // Define o slide inicial
            var slideHtml = `
                <div class="modal-slide ${activeClass}">
                    <div class="row">
                        <div class="col-lg-6 col-12 img-diferencial">
                            <img src="${item.imagem}" alt="${item.titulo}">
                        </div>
                        <div class="col-lg-6 col-12 d-flex flex-column justify-content-center pe-lg-5 pe-0">
                            <h3>${item.titulo}</h3>
                            <p>${item.descricao}</p>
                        </div>
                    </div>
                </div>
            `;
            $(".modal-slider").append(slideHtml);
        });
        // Inicializa o Slick Slider na modal
        $(".modal-slider").slick({
            initialSlide: itemId, // Começa pelo slide clicado
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: false,
        });

        // Exibe a modal
        $("#modalSlider").fadeIn();
    });

    // Plantas/Implantação - modal
    $('#plantas-implantacao img[data-toggle="modal"]').on("click", function () {
        $("body").addClass("modal-open");
        var optionMenu = "#" + $(this).data("target");
        var content = "#content-" + $(this).data("target");

        $("#plantas-implantacao .modal-menu span").removeClass("active");
        $(optionMenu).addClass("active");
        $("#content-plantas, #content-implantacao").hide();
        $(content).show();
        $("#modalPlantasImplantacao").show();

        $("#fullscreen-btn").attr("data-target", $(this).data("target"));
    });

    // Botões Plantas | Implantação
    $("#plantas, #implantacao").on("click", function () {
        var content = "#content-" + $(this).attr("id");
        $("#fullscreen-btn").attr("data-target", $(this).attr("id"));

        $("#plantas-implantacao .modal-menu span").removeClass("active");
        $(this).addClass("active");
        $("#content-plantas, #content-implantacao").hide();
        $(content).show();
    });

    // Botões plantas
    $(".category-plantas").on("click", function () {
        const selectedId = $(this).data("id");
        $(".category-plantas").removeClass("active");
        $(this).addClass("active");

        // Esconder todas as imagens e remover a classe 'visible'
        $(".planta-image").fadeOut(200, function () {
            $(this).removeClass("visible");
        });

        // Mostrar a imagem correspondente com fadeIn e adicionar a classe 'visible'
        $(`#${selectedId}`).fadeIn(200, function () {
            $(this).addClass("visible");
        });
    });

    // Botão de zoom
    let zoomActive = false; // Estado do botão de zoom

    // Alternar o zoom no botão
    $("#zoom-btn").on("click", function () {
        $(this).toggleClass("active");
        zoomActive = !zoomActive;
        if (zoomActive) {
            $(".image-container").addClass("zoom-active");
        } else {
            $(".image-container").removeClass("zoom-active");
            $(".image-container img").css("transform", "scale(1)"); // Resetar zoom
        }
    });
    $("#zoom-btn-galeria").on("click", function () {
        $(this).toggleClass("active");
        zoomActive = !zoomActive;
        if (zoomActive) {
            $(".galeria-item").addClass("zoom-active");
        } else {
            $(".galeria-item").removeClass("zoom-active");
            $(".galeria-item").css("transform", "scale(1)"); // Resetar zoom
        }
    });

    // Aplicar zoom baseado na posição do cursor
    $(".image-container img, .galeria-item").on("mousemove", function (e) {
        if (!zoomActive) return; // Se o zoom não estiver ativo, sair

        const image = $(this);
        const offset = image.offset(); // Obter posição da imagem na página
        const width = image.width(); // Largura da imagem
        const height = image.height(); // Altura da imagem

        const x = e.pageX - offset.left; // Posição X do cursor na imagem
        const y = e.pageY - offset.top; // Posição Y do cursor na imagem

        const zoomLevel = 2; // Nível de zoom (pode ser ajustado)

        // Calcular o deslocamento para o zoom
        const xPercent = (x / width) * 40;
        const yPercent = (y / height) * 40;

        // Aplicar o zoom com base na posição do cursor
        image.css({
            transform: `scale(${zoomLevel})`,
            "transform-origin": `${xPercent}% ${yPercent}%`, // Define o ponto de origem do zoom
        });
    });

    // Resetar zoom ao sair da imagem
    $(".image-container img, .galeria-item").on("mouseleave", function () {
        if (!zoomActive) return;
        $(this).css("transform", "scale(1)");
    });

    // Botão de fullscreen
    $("#fullscreen-btn").on("click", function () {
        // Seleciona qual aba está ativa para buscar a imagem
        const dataTarget = $(this).attr("data-target");
        const contentSelector =
            "#content-" + dataTarget + " .image-container img.visible";

        // Seleciona a imagem visível
        const image = $(contentSelector).get(0);

        if (image) {
            if (image.requestFullscreen) {
                image.requestFullscreen();
            } else if (image.webkitRequestFullscreen) {
                image.webkitRequestFullscreen();
            } else if (image.msRequestFullscreen) {
                image.msRequestFullscreen();
            }
        } else {
            console.error("Imagem não encontrada para fullscreen.");
        }
    });

    // Fechar modal
    $(".close-modal").on("click", function () {
        var dataModal = "#" + $(this).data("modal");
        $(dataModal).hide();
        if (
            dataModal == "#modalImagem" ||
            dataModal == "#modalGaleria" ||
            dataModal == "#modalSlider" ||
            dataModal == "#modalPlantasImplantacao" ||
            dataModal == "#modalContato"
        ) {
            $("body").removeClass("modal-open");
        }
        if (dataModal == "#modalSlider") {
            $(".modal-slider").slick("unslick");
        }
    });

    // Acompanhar a obra
    $(".accordion-header").on("click", function () {
        const content = $(this).next(".accordion-content");
        const isActive = $(this).hasClass("active");

        // Fecha todos os outros itens
        $(".accordion-header").removeClass("active");
        $(".accordion-content").css("max-height", "0");

        // Se não estiver ativo, abre o item clicado
        if (!isActive) {
            $(this).addClass("active");
            content.css("max-height", content[0].scrollHeight + "px");
        }
    });

    // Abrir modal de contato
    $("#btn-contato").on("click", function () {
        $("body").addClass("modal-open");
        $("#modalContato").show();
    });

    // Portfólio
    $(".category-portfolio").on("click", function (e) {
        e.preventDefault();
        const categoryId = $(this).data("category-id");
        var searchQuery = $("#search-input-portfolio").val();

        if ($("#page-portfolio").length > 0) {
            portfolioCompleto = 1;
        } else {
            portfolioCompleto = 0;
        }

        $(".category-portfolio").removeClass("active");
        $(this).addClass("active");

        load_portfolio(categoryId, portfolioCompleto, searchQuery);
    });

    $(".category-portfolio").first().trigger("click");

    function load_portfolio(categoryId, portfolioCompleto, searchQuery = "") {
        $.ajax({
            url: ajaxurl,
            method: "POST",
            data: {
                action: "load_portfolio_posts",
                category_id: categoryId,
                portfolio_completo: portfolioCompleto,
                search_query: searchQuery,
            },
            beforeSend: function () {
                $("#portfolio-posts").html("<p>Buscando imóveis...</p>");
            },
            success: function (response) {
                $("#portfolio-posts").html(response);
            },
            error: function () {
                $("#portfolio-posts").html("<p>Erro ao carregar posts.</p>");
            },
        });
    }

    // Busca Portfólio
    $("#search-input-portfolio").on("keypress", function (e) {
        if (e.which === 13) {
            e.preventDefault();
            var searchQuery = $(this).val();
            const categoryId = $(".category-portfolio.active").data(
                "category-id"
            );
            load_portfolio(categoryId, 1, searchQuery);
        }
    });

    // Blog
    $(".blog-category-btn").on("click", function (e) {
        e.preventDefault();
        const categoryId = $(this).data("category-id");
        $(".blog-category-btn").removeClass("active");
        $(this).addClass("active");
        page = 1;
        loadPosts(categoryId, page);
    });

    // Busca Blog
    $("#search-input").on("keypress", function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $("#search-button").click();
        }
    });

    $(document).on("click", "#search-button", function (e) {
        e.preventDefault();

        var searchQuery = $("#search-input").val();
        var categoryId =
            $(".blog-category-btn.active").data("category-id") || 0;
        var page = 1;

        loadPosts(categoryId, page, searchQuery);
    });

    function loadPosts(categoryId, page, searchQuery = "") {
        $.ajax({
            url: ajaxurl,
            method: "POST",
            data: {
                action: "load_blog_posts",
                category_id: categoryId,
                paged: page,
                search_query: searchQuery,
            },
            beforeSend: function () {
                $("#blog-posts").html("<p>Buscando posts...</p>");
            },
            success: function (response) {
                $("#blog-posts").html(response);
            },
            error: function () {
                $("#blog-posts").html("<p>Erro ao carregar posts.</p>");
            },
        });
    }

    $(".blog-category-btn").first().trigger("click");

    // Fim Busca Blog

    // Paginação
    $(document).on("click", ".pagination a", function (e) {
        e.preventDefault();

        var categoryId = $(".blog-category-btn.active").data("category-id");

        if ($(this).hasClass("next")) {
            page = parseInt($(".current").text(), 10) + 1;
        } else if ($(this).hasClass("prev")) {
            page = parseInt($(".current").text(), 10) - 1;
        } else {
            page = $(this).text();
        }

        loadPosts(categoryId, page);
    });

    // Botão compartilhar post (modal)
    $(document).on("click", ".btn-compartilhar", function (e) {
        e.preventDefault();

        const shareModal = document.getElementById("shareModal");
        const closeModal = document.querySelector(".close-modal");
        const shareButtons = document.querySelectorAll(".btn-share");

        // Atualiza as variáveis com base no botão clicado
        let postUrl = encodeURIComponent($(this).attr("data-url"));
        let postTitle = encodeURIComponent($(this).attr("data-title"));

        // Abre a modal
        shareModal.style.display = "flex";

        // Fechar a modal ao clicar no botão de fechamento
        if (closeModal) {
            closeModal.onclick = function () {
                shareModal.style.display = "none";
                limparListeners(); // Limpa os listeners para evitar problemas no próximo clique
            };
        }

        // Fechar a modal ao clicar fora do conteúdo
        window.onclick = function (e) {
            if (e.target === shareModal) {
                shareModal.style.display = "none";
                limparListeners(); // Limpa os listeners
            }
        };

        // Configura o evento de clique nos botões de compartilhamento
        shareButtons.forEach((button) => {
            button.onclick = function (e) {
                e.preventDefault();

                const network = this.getAttribute("data-network");
                let shareUrl = "";

                switch (network) {
                    case "facebook":
                        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${postUrl}`;
                        break;
                    case "twitter":
                        shareUrl = `https://twitter.com/intent/tweet?url=${postUrl}&text=${postTitle}`;
                        break;
                    case "whatsapp":
                        shareUrl = `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`;
                        break;
                    case "linkedin":
                        shareUrl = `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`;
                        break;
                    default:
                        console.log("Rede social não configurada.");
                }

                if (shareUrl) {
                    window.open(shareUrl, "_blank", "width=600,height=400");
                }
            };
        });

        // Função para limpar os eventos dos botões de compartilhamento
        function limparListeners() {
            shareButtons.forEach((button) => {
                button.onclick = null;
            });

            closeModal.onclick = null;
            window.onclick = null;
        }
    });
});
