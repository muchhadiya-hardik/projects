import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        // viteStaticCopy({
        //     targets: [
        //         {
        //             src: "resources/assets/front/images/",
        //             dest: "front/",
        //         },
        //     ],
        // }),
        viteStaticCopy({
            targets: [
                {
                    src: "resources/assets/admin/images/",
                    dest: "admin/",
                },
            ],
        }),
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                // "resources/vendor/dataTables/dataTables.bootstrap5.min.css",
                // "resources/vendor/dataTables/responsive.dataTables.min.css",
                "resources/assets/admin/js/app.js",
                "resources/assets/admin/scss/app.scss",
                // "resources/assets/admin/vendor/metisMenu/jquery.metisMenu.js",
                "resources/assets/admin/vendor/validation/jquery.form-validator.min.css",
                "resources/assets/admin/vendor/ionRangeSlider/ion.rangeSlider.min.css",
                "resources/assets/admin/vendor/dataTables/dataTables.bootstrap5.min.css",
                "resources/assets/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css",
                "resources/assets/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.js",
                "resources/assets/admin/vendor/dataTables/responsive.dataTables.min.css",
                "resources/assets/admin/vendor/select2/select2.min.css",
                "resources/assets/admin/vendor/pace/pace.min.js",
                "resources/assets/admin/vendor/iCheck/js/icheck.min.js",
                "resources/assets/admin/vendor/validation/jquery.form-validator.min.js",
                "resources/assets/admin/vendor/jeditable/jquery.jeditable.min.js",
                "resources/assets/admin/vendor/ionRangeSlider/ion.rangeSlider.min.js",
                "resources/assets/admin/vendor/select2/select2.full.min.js",
                "resources/assets/admin/js/common.js",
                "Modules/Media/Resources/assets/js/app.js",
                "Modules/Media/Resources/assets/sass/app.scss",
                "Modules/Blog/Resources/assets/vendor/content_builder/contentbuilder/contentbuilder.css",
                "Modules/Blog/Resources/assets/vendor/content_builder/contentbuilder/jquery.min.js",
                "Modules/Blog/Resources/assets/vendor/content_builder/contentbuilder/jquery-ui.min.js",
                "Modules/Blog/Resources/assets/vendor/content_builder/contentbuilder/contentbuilder.js",
                "Modules/Blog/Resources/assets/vendor/content_builder/contentbuilder/saveimages.js",
                "Modules/Blog/Resources/assets/vendor/content_builder/assets/minimalist-basic/content-bootstrap.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            "~jquery": path.resolve(
                __dirname,
                "node_modules/jquery/dist/jquery.min.js"
            ),
            // "~font-awesome":path.resolve(__dirname,'resources/assets/admin/vendor/font-awesome/scss/font-awesome.scss')
        },
    },
});
