# Ipm Desafio Tecnico

Link do projeto:
https://teste.hassetech.com/

## Banco de dados

```
CREATE TABLE TASKS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    TITULO VARCHAR(255) NOT NULL,
    DESCRICAO TEXT,
    STATUS binary DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    DATE DATE,
    DELETED BINARY DEFAULT 0 NULL
);
```
