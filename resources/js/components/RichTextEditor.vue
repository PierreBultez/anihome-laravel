<script setup lang="ts">
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import Link from '@tiptap/extension-link';
import Image from '@tiptap/extension-image';
import axios from 'axios';
import { watch, onBeforeUnmount, ref } from 'vue';
import {
    Bold,
    Italic,
    Strikethrough,
    Heading2,
    Heading3,
    List,
    ListOrdered,
    Link as LinkIcon,
    Image as ImageIcon,
    Quote,
    Code,
    Undo,
    Redo,
    Loader2,
} from 'lucide-vue-next';
import { Button } from '@/components/ui/button';

const props = defineProps<{
    modelValue: string;
}>();

const emit = defineEmits(['update:modelValue']);

const fileInput = ref<HTMLInputElement | null>(null);
const isUploading = ref(false);

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,
        Link.configure({
            openOnClick: false,
            HTMLAttributes: {
                class: 'text-primary underline decoration-primary',
            },
        }),
        Image.configure({
            HTMLAttributes: {
                class: 'rounded-lg max-w-full h-auto',
            },
        }),
    ],
    editorProps: {
        attributes: {
            class: 'prose dark:prose-invert max-w-none focus:outline-hidden min-h-[300px] p-4',
        },
    },
    onUpdate: () => {
        emit('update:modelValue', editor.value?.getHTML());
    },
});

watch(
    () => props.modelValue,
    (value) => {
        const isSame = editor.value?.getHTML() === value;
        if (isSame) {
            return;
        }
        editor.value?.commands.setContent(value, false);
    },
);

// Toolbar helpers
const setLink = () => {
    const previousUrl = editor.value?.getAttributes('link').href;
    const url = window.prompt('URL', previousUrl);

    if (url === null) return;

    if (url === '') {
        editor.value?.chain().focus().extendMarkRange('link').unsetLink().run();
        return;
    }

    editor.value
        ?.chain()
        .focus()
        .extendMarkRange('link')
        .setLink({ href: url })
        .run();
};

const triggerFileInput = () => {
    fileInput.value?.click();
};

const handleFileSelect = async (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        const file = target.files[0];
        await uploadImage(file);
        // Reset input
        target.value = '';
    }
};

const uploadImage = async (file: File) => {
    const formData = new FormData();
    formData.append('image', file);

    isUploading.value = true;
    try {
        const response = await axios.post('/admin/media/upload', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        if (response.data.url) {
            editor.value
                ?.chain()
                .focus()
                .setImage({ src: response.data.url })
                .run();
        }
    } catch (error) {
        console.error('Upload failed:', error);
        alert("Échec de l'envoi de l'image.");
    } finally {
        isUploading.value = false;
    }
};

onBeforeUnmount(() => {
    editor.value?.destroy();
});
</script>

<template>
    <div class="overflow-hidden rounded-md border bg-background">
        <input
            type="file"
            ref="fileInput"
            class="hidden"
            accept="image/*"
            @change="handleFileSelect"
        />

        <div
            v-if="editor"
            class="flex flex-wrap gap-1 border-b bg-muted/50 p-2"
        >
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleBold().run()"
                :class="{
                    'bg-accent text-accent-foreground': editor.isActive('bold'),
                }"
                title="Gras"
                type="button"
            >
                <Bold class="h-4 w-4" />
            </Button>
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleItalic().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('italic'),
                }"
                title="Italique"
                type="button"
            >
                <Italic class="h-4 w-4" />
            </Button>
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleStrike().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('strike'),
                }"
                title="Barré"
                type="button"
            >
                <Strikethrough class="h-4 w-4" />
            </Button>

            <div class="mx-1 h-8 w-px bg-border"></div>

            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="
                    editor.chain().focus().toggleHeading({ level: 2 }).run()
                "
                :class="{
                    'bg-accent text-accent-foreground': editor.isActive(
                        'heading',
                        { level: 2 },
                    ),
                }"
                title="Titre 2"
                type="button"
            >
                <Heading2 class="h-4 w-4" />
            </Button>
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="
                    editor.chain().focus().toggleHeading({ level: 3 }).run()
                "
                :class="{
                    'bg-accent text-accent-foreground': editor.isActive(
                        'heading',
                        { level: 3 },
                    ),
                }"
                title="Titre 3"
                type="button"
            >
                <Heading3 class="h-4 w-4" />
            </Button>

            <div class="mx-1 h-8 w-px bg-border"></div>

            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleBulletList().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('bulletList'),
                }"
                title="Liste à puces"
                type="button"
            >
                <List class="h-4 w-4" />
            </Button>
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleOrderedList().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('orderedList'),
                }"
                title="Liste numérotée"
                type="button"
            >
                <ListOrdered class="h-4 w-4" />
            </Button>

            <div class="mx-1 h-8 w-px bg-border"></div>

            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleBlockquote().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('blockquote'),
                }"
                title="Citation"
                type="button"
            >
                <Quote class="h-4 w-4" />
            </Button>
            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="editor.chain().focus().toggleCodeBlock().run()"
                :class="{
                    'bg-accent text-accent-foreground':
                        editor.isActive('codeBlock'),
                }"
                title="Code"
                type="button"
            >
                <Code class="h-4 w-4" />
            </Button>

            <div class="mx-1 h-8 w-px bg-border"></div>

            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="setLink"
                :class="{
                    'bg-accent text-accent-foreground': editor.isActive('link'),
                }"
                title="Lien"
                type="button"
            >
                <LinkIcon class="h-4 w-4" />
            </Button>

            <Button
                variant="ghost"
                size="icon"
                class="h-8 w-8"
                @click="triggerFileInput"
                title="Insérer une image"
                type="button"
                :disabled="isUploading"
            >
                <Loader2 v-if="isUploading" class="h-4 w-4 animate-spin" />
                <ImageIcon v-else class="h-4 w-4" />
            </Button>

            <div class="ml-auto flex items-center gap-1">
                <Button
                    variant="ghost"
                    size="icon"
                    class="h-8 w-8"
                    @click="editor.chain().focus().undo().run()"
                    :disabled="!editor.can().chain().focus().undo().run()"
                    title="Annuler"
                    type="button"
                >
                    <Undo class="h-4 w-4" />
                </Button>
                <Button
                    variant="ghost"
                    size="icon"
                    class="h-8 w-8"
                    @click="editor.chain().focus().redo().run()"
                    :disabled="!editor.can().chain().focus().redo().run()"
                    title="Rétablir"
                    type="button"
                >
                    <Redo class="h-4 w-4" />
                </Button>
            </div>
        </div>
        <editor-content :editor="editor" />
    </div>
</template>
