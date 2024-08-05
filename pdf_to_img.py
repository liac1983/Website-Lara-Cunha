from pdf2image import convert_from_path

# Converta o PDF em uma lista de imagens
images = convert_from_path('LCOM_PROJ (1).pdf')

# Salve cada página como uma imagem
for i, image in enumerate(images):
    image.save(f'Project1_page{i+1}.png', 'PNG')
